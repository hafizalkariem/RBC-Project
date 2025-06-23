@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    @keyframes slideIn {
        from {
            transform: translateX(-100%);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes glow {

        0%,
        100% {
            box-shadow: 0 0 20px rgba(239, 68, 68, 0.3);
        }

        50% {
            box-shadow: 0 0 30px rgba(239, 68, 68, 0.5), 0 0 40px rgba(239, 68, 68, 0.3);
        }
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    .animate-pulse-custom {
        animation: pulse 2s infinite;
    }

    .animate-slideIn {
        animation: slideIn 0.8s ease-out forwards;
    }

    .animate-glow {
        animation: glow 2s ease-in-out infinite;
    }

    .hover-lift {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }

    .tech-tag {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .tech-tag::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .tech-tag:hover::before {
        left: 100%;
    }

    .tech-tag:hover {
        transform: scale(1.1);
    }

    .table-row {
        transition: all 0.3s ease;
        position: relative;
    }



    .table-row:hover {
        background: rgba(239, 68, 68, 0.05);
        transform: translateX(5px);
    }

    .stat-card {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(139, 69, 19, 0.1));
        border: 1px solid rgba(239, 68, 68, 0.2);
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(45deg, #ef4444, #dc2626, #b91c1c, #ef4444);
        border-radius: inherit;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .stat-card:hover::before {
        opacity: 1;
    }

    .floating {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .glass-effect {
        backdrop-filter: blur(16px);
        background: rgba(0, 0, 0, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .gradient-text {
        background: linear-gradient(45deg, #ef4444, #f87171, #fca5a5);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .progress-bar {
        height: 4px;
        background: rgba(239, 68, 68, 0.2);
        border-radius: 2px;
        overflow: hidden;
        position: relative;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #ef4444, #f87171);
        border-radius: 2px;
        transition: width 1s ease-in-out;
        position: relative;
    }

    .progress-fill::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        animation: shimmer 2s infinite;
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }
</style>

<!-- Header Stats Section -->
<x-admin.products.header :products="$products" :categories="$categories" />

<!-- Main Products Section -->
<x-admin.products.main-products :products="$products" :categories="$categories" />

<!-- Categories & Technologies Section -->
<x-admin.products.categories-technology :categories="$categories" :technologies="$technologies" :products="$products" />

<!-- Quick Actions Section -->
<x-admin.products.quick-actions :products="$products" />

<!-- Top Selling Products Section -->
<x-admin.products.top-selling :products="$products" />

<script>
    // Add some interactive animations
    document.addEventListener('DOMContentLoaded', function() {
        // Animate progress bars on load
        setTimeout(() => {
            const progressBars = document.querySelectorAll('.progress-fill');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 200);
            });
        }, 500);

        // Add hover effects to table rows
        const tableRows = document.querySelectorAll('.table-row');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(10px)';
            });

            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });

        // Add click ripple effect to buttons
        const buttons = document.querySelectorAll('button');
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');

                this.appendChild(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    });

    // Add ripple effect styles
    const style = document.createElement('style');
    style.textContent = `
.ripple {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    transform: scale(0);
    animation: ripple-animation 0.6s linear;
    pointer-events: none;
}

@keyframes ripple-animation {
    to {
        transform: scale(4);
        opacity: 0;
    }
}

.tech-tag:hover {
    transform: scale(1.1) rotate(2deg);
}

.stat-card:hover .gradient-text {
    animation: pulse 1s infinite;
}

.floating:nth-child(2) {
    animation-delay: -1s;
}

.floating:nth-child(3) {
    animation-delay: -2s;
}

.floating:nth-child(4) {
    animation-delay: -0.5s;
}
`;
    document.head.appendChild(style);
</script>

@endsection