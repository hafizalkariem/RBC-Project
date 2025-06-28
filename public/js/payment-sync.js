// Payment Status Auto-Sync
class PaymentSync {
    constructor() {
        this.intervals = new Map();
    }

    // Start monitoring payment status
    startMonitoring(orderId, callback, intervalMs = 30000) {
        if (this.intervals.has(orderId)) {
            this.stopMonitoring(orderId);
        }

        const checkStatus = async () => {
            try {
                const response = await fetch(`/api/payment-status/${orderId}`);
                const data = await response.json();
                
                if (callback) {
                    callback(data);
                }

                // Stop monitoring if payment is completed or failed
                if (data.status === 'completed' || data.status === 'failed') {
                    this.stopMonitoring(orderId);
                }
            } catch (error) {
                console.error('Error checking payment status:', error);
            }
        };

        // Check immediately
        checkStatus();

        // Set interval for periodic checks
        const intervalId = setInterval(checkStatus, intervalMs);
        this.intervals.set(orderId, intervalId);
    }

    // Stop monitoring payment status
    stopMonitoring(orderId) {
        if (this.intervals.has(orderId)) {
            clearInterval(this.intervals.get(orderId));
            this.intervals.delete(orderId);
        }
    }

    // Stop all monitoring
    stopAll() {
        this.intervals.forEach((intervalId) => {
            clearInterval(intervalId);
        });
        this.intervals.clear();
    }
}

// Global instance
window.paymentSync = new PaymentSync();

// Auto-sync pending payments on profile page
document.addEventListener('DOMContentLoaded', function() {
    // Check if we're on profile page with pending payments
    const pendingPayments = document.querySelectorAll('[data-order-id]');
    
    pendingPayments.forEach(element => {
        const orderId = element.dataset.orderId;
        const paymentStatus = element.dataset.paymentStatus;
        
        if (paymentStatus === 'pending') {
            window.paymentSync.startMonitoring(orderId, (data) => {
                // Update UI based on payment status
                updatePaymentStatus(orderId, data);
            });
        }
    });
});

function updatePaymentStatus(orderId, data) {
    const statusElement = document.querySelector(`[data-order-id="${orderId}"] .payment-status`);
    const orderElement = document.querySelector(`[data-order-id="${orderId}"]`);
    
    if (statusElement) {
        if (data.status === 'completed') {
            statusElement.innerHTML = '<span class="text-green-400">Selesai</span>';
            statusElement.className = statusElement.className.replace('text-yellow-400', 'text-green-400');
        } else if (data.status === 'failed') {
            statusElement.innerHTML = '<span class="text-red-400">Gagal</span>';
            statusElement.className = statusElement.className.replace('text-yellow-400', 'text-red-400');
        }
    }
    
    // Hide pending payment alert if payment is completed or failed
    if (data.status !== 'pending' && orderElement && orderElement.closest('.pending-payment-alert')) {
        orderElement.closest('.pending-payment-alert').style.display = 'none';
        
        // Show success/failure message
        showPaymentStatusMessage(data.status, orderId);
    }
}

function showPaymentStatusMessage(status, orderId) {
    const message = status === 'completed' 
        ? `Pembayaran untuk Order #${orderId} berhasil!`
        : `Pembayaran untuk Order #${orderId} gagal atau expired.`;
    
    const alertClass = status === 'completed' 
        ? 'bg-green-500/20 border-green-500/30 text-green-400'
        : 'bg-red-500/20 border-red-500/30 text-red-400';
    
    const alertHtml = `
        <div class="mb-6 ${alertClass} border rounded-xl p-4 payment-status-alert">
            <div class="flex items-center space-x-3">
                <i class="fas fa-${status === 'completed' ? 'check-circle' : 'times-circle'}"></i>
                <span>${message}</span>
            </div>
        </div>
    `;
    
    // Insert at top of page
    const container = document.querySelector('.max-w-7xl');
    if (container) {
        container.insertAdjacentHTML('afterbegin', alertHtml);
        
        // Auto-hide after 5 seconds
        setTimeout(() => {
            const alert = document.querySelector('.payment-status-alert');
            if (alert) {
                alert.remove();
            }
        }, 5000);
    }
}

// Cleanup on page unload
window.addEventListener('beforeunload', function() {
    if (window.paymentSync) {
        window.paymentSync.stopAll();
    }
});