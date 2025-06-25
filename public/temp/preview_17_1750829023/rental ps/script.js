// Initialize AOS
AOS.init({
  duration: 1000,
  once: true,
});

// Sample data for demonstration
let orders = [
  {
    id: 1,
    name: "Ahmad Rizki",
    package: "Mingguan",
    date: "2025-06-15",
    status: "Aktif",
    phone: "081234567890",
  },
  {
    id: 2,
    name: "Sari Indah",
    package: "Harian",
    date: "2025-06-14",
    status: "Selesai",
    phone: "081234567891",
  },
  {
    id: 3,
    name: "Deni Kurniawan",
    package: "Bulanan",
    date: "2025-06-13",
    status: "Pending",
    phone: "081234567892",
  },
];

let packages = [
  {
    id: 1,
    name: "Harian",
    price: 50000,
    duration: "24 Jam",
    controllers: 2,
    games: 5,
  },
  {
    id: 2,
    name: "Mingguan",
    price: 300000,
    duration: "7 Hari",
    controllers: 4,
    games: 10,
  },
  {
    id: 3,
    name: "Bulanan",
    price: 1000000,
    duration: "30 Hari",
    controllers: 4,
    games: "Unlimited",
  },
];

let customers = [
  {
    name: "Ahmad Rizki",
    phone: "081234567890",
    totalOrders: 3,
    lastRent: "2025-06-15",
    status: "VIP",
  },
  {
    name: "Sari Indah",
    phone: "081234567891",
    totalOrders: 1,
    lastRent: "2025-06-14",
    status: "Regular",
  },
  {
    name: "Deni Kurniawan",
    phone: "081234567892",
    totalOrders: 5,
    lastRent: "2025-06-13",
    status: "VIP",
  },
];

// Navigation functions
function toggleMenu() {
  // Mobile menu toggle logic
  alert("Mobile menu toggle - implement as needed");
}

function scrollToSection(sectionId) {
  document.getElementById(sectionId).scrollIntoView({
    behavior: "smooth",
  });
}

function openWhatsApp() {
  window.open(
    "https://wa.me/6282226221535?text=Halo, saya ingin bertanya tentang rental PlayStation",
    "_blank"
  );
}

// Booking functions
function orderPackage(packageName, price) {
  document.querySelector('select[name="package"]').value = packageName;
  scrollToSection("booking");
}

function showCustomAlert() {
  const alertEl = document.getElementById("customAlert");
  const alertContent = alertEl.querySelector(".bg-white");

  alertEl.classList.remove("hidden");
  alertContent.classList.add("alert-enter");

  // Auto close after 5 seconds
  setTimeout(() => {
    if (!alertEl.classList.contains("hidden")) {
      closeCustomAlert();
    }
  }, 5000);
}

function closeCustomAlert() {
  const alertEl = document.getElementById("customAlert");
  const alertContent = alertEl.querySelector(".bg-white");

  alertContent.classList.remove("alert-enter");
  alertContent.classList.add("alert-exit");

  setTimeout(() => {
    alertEl.classList.add("hidden");
    alertContent.classList.remove("alert-exit");
  }, 300);
}

// Close alert when clicking outside
document.getElementById("customAlert").addEventListener("click", function (e) {
  if (e.target === this) {
    closeCustomAlert();
  }
});

// FORM HANDLER YANG SUDAH ADA - MODIFIKASI INI
document.getElementById("bookingForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const formData = new FormData(this);
  const data = {};
  formData.forEach((value, key) => {
    data[key] = value;
  });

  // Create WhatsApp message
  const message = `Halo, saya ingin menyewa PlayStation dengan detail berikut:
          
Nama: ${data.name}
WhatsApp: ${data.phone}
Alamat: ${data.address}
Paket: ${data.package}
Tanggal Sewa: ${data.date}
Pembayaran: ${data.payment}

Mohon konfirmasi ketersediaan. Terima kasih!`;

  const encodedMessage = encodeURIComponent(message);
  window.open(`https://wa.me/6282226221535?text=${encodedMessage}`, "_blank");

  // Add to orders (simulation)
  const newOrder = {
    id: orders.length + 1,
    name: data.name,
    package: data.package,
    date: data.date,
    status: "Pending",
    phone: data.phone,
  };
  orders.push(newOrder);
  updateDashboard();

  // GANTI BARIS INI:
  // alert("Pesanan berhasil dikirim! Anda akan diarahkan ke WhatsApp.");

  // DENGAN BARIS INI:
  showCustomAlert();

  this.reset();
});

// Admin functions
function showAdminLogin() {
  document.getElementById("adminModal").classList.remove("hidden");
  document.getElementById("adminModal").classList.add("flex");
}

function hideAdminLogin() {
  document.getElementById("adminModal").classList.add("hidden");
  document.getElementById("adminModal").classList.remove("flex");
}

document.getElementById("adminForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const username = document.getElementById("adminUsername").value;
  const password = document.getElementById("adminPassword").value;

  // Simple authentication (in real app, use proper authentication)
  if (username === "admin" && password === "admin123") {
    hideAdminLogin();
    showAdminDashboard();
    updateDashboard();
  } else {
    alert("Username atau password salah!");
  }
});

function showAdminDashboard() {
  document.getElementById("adminDashboard").classList.remove("hidden");
  document.body.style.overflow = "hidden";
}

function logout() {
  document.getElementById("adminDashboard").classList.add("hidden");
  document.body.style.overflow = "auto";
  document.getElementById("adminForm").reset();
}

function showTab(tabName) {
  // Hide all tab contents
  document.querySelectorAll(".tab-content").forEach((content) => {
    content.classList.add("hidden");
  });

  // Remove active class from all tabs
  document.querySelectorAll('[id$="Tab"]').forEach((tab) => {
    tab.classList.remove("bg-blue-600");
    tab.classList.add("bg-slate-700");
  });

  // Show selected tab content
  document.getElementById(tabName + "Content").classList.remove("hidden");

  // Add active class to selected tab
  document.getElementById(tabName + "Tab").classList.add("bg-blue-600");
  document.getElementById(tabName + "Tab").classList.remove("bg-slate-700");
}

function updateDashboard() {
  // Update stats
  document.getElementById("totalOrders").textContent = orders.length;
  document.getElementById("todayOrders").textContent = orders.filter(
    (order) => order.date === "2025-06-15"
  ).length;

  const monthlyRevenue = orders.reduce((total, order) => {
    const packagePrices = { Harian: 50000, Mingguan: 300000, Bulanan: 1000000 };
    return total + (packagePrices[order.package] || 0);
  }, 0);
  document.getElementById("monthlyRevenue").textContent =
    "Rp " + monthlyRevenue.toLocaleString("id-ID");

  // Update orders table
  const ordersTableBody = document.getElementById("ordersTable");
  ordersTableBody.innerHTML = "";

  orders.forEach((order) => {
    const row = document.createElement("tr");
    row.classList.add("border-b", "border-slate-700");

    const statusColor =
      order.status === "Aktif"
        ? "text-green-400"
        : order.status === "Pending"
        ? "text-yellow-400"
        : "text-gray-400";

    row.innerHTML = `
                    <td class="py-3 px-4">#${order.id}</td>
                    <td class="py-3 px-4">${order.name}</td>
                    <td class="py-3 px-4">${order.package}</td>
                    <td class="py-3 px-4">${order.date}</td>
                    <td class="py-3 px-4 ${statusColor}">${order.status}</td>
                    <td class="py-3 px-4">
                        <button onclick="updateOrderStatus(${order.id})" class="bg-blue-600 px-3 py-1 rounded text-sm hover:bg-blue-700 transition-colors mr-2">
                            Update
                        </button>
                        <button onclick="deleteOrder(${order.id})" class="bg-red-600 px-3 py-1 rounded text-sm hover:bg-red-700 transition-colors">
                            Hapus
                        </button>
                    </td>
                `;
    ordersTableBody.appendChild(row);
  });

  // Update customers table
  function renderCustomersTable() {
    const customersTableBody = document.getElementById("customersTable");
    const totalCustomersSpan = document.getElementById("totalCustomers");

    customersTableBody.innerHTML = "";
    totalCustomersSpan.textContent = customers.length;

    customers.forEach((customer, index) => {
      const row = document.createElement("tr");
      row.classList.add(
        "border-b",
        "border-slate-700/50",
        "table-row-hover",
        "animate-fade-in-up"
      );
      row.style.animationDelay = `${index * 0.1}s`;

      const statusColor =
        customer.status === "VIP" ? "text-purple-400" : "text-blue-400";
      const statusBg =
        customer.status === "VIP"
          ? "bg-purple-500/20 border-purple-500/50"
          : "bg-blue-500/20 border-blue-500/50";
      const statusIcon =
        customer.status === "VIP" ? "fas fa-crown" : "fas fa-user";

      row.innerHTML = `
            <td class="py-4 px-6">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                        ${customer.name.charAt(0).toUpperCase()}
                    </div>
                    <div>
                        <div class="font-semibold text-white">${
                          customer.name
                        }</div>
                        <div class="text-slate-400 text-sm">Pelanggan</div>
                    </div>
                </div>
            </td>
            <td class="py-4 px-6">
                <div class="flex items-center space-x-2">
                    <i class="fab fa-whatsapp text-green-400"></i>
                    <span class="text-slate-300 font-mono">${
                      customer.phone
                    }</span>
                    <button class="ml-2 text-green-400 hover:text-green-300 transition-colors">
                        <i class="fas fa-external-link-alt text-xs"></i>
                    </button>
                </div>
            </td>
            <td class="py-4 px-6">
                <div class="flex items-center space-x-2">
                    <div class="bg-orange-500/20 border border-orange-500/50 rounded-lg px-3 py-1">
                        <span class="text-orange-400 font-bold">${
                          customer.totalOrders
                        }</span>
                    </div>
                    <span class="text-slate-400 text-sm">pesanan</span>
                </div>
            </td>
            <td class="py-4 px-6">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-calendar-alt text-blue-400"></i>
                    <span class="text-slate-300">${customer.lastRent}</span>
                </div>
            </td>
            <td class="py-4 px-6">
                <div class="flex items-center space-x-2">
                    <div class="status-badge ${statusBg} border rounded-full px-3 py-1 flex items-center space-x-2">
                        <i class="${statusIcon} ${statusColor} text-sm"></i>
                        <span class="${statusColor} font-semibold text-sm">${
        customer.status
      }</span>
                    </div>
                </div>
            </td>
        `;
      customersTableBody.appendChild(row);
    });
  }

  // Initialize table
  renderCustomersTable();
  // Update packages grid
  const packagesGrid = document.getElementById("packagesGrid");
  packagesGrid.innerHTML = "";

  packages.forEach((pkg) => {
    const card = document.createElement("div");
    card.classList.add("glass-effect", "rounded-xl", "p-6");

    card.innerHTML = `
                    <div class="relative">
                        <!-- Package Icon & Title -->
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center mr-4">
                                <span class="text-xl">${
                                  pkg.name === "Harian"
                                    ? "🎮"
                                    : pkg.name === "Mingguan"
                                    ? "🏆"
                                    : "👑"
                                }</span>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gradient">Paket ${
                                  pkg.name
                                }</h4>
                                <p class="text-sm text-gray-400">PlayStation 5 Package</p>
                            </div>
                        </div>
                        
                        <!-- Price Display -->
                        <div class="text-center mb-6">
                            <div class="text-3xl font-bold ${
                              pkg.name === "Harian"
                                ? "text-green-400"
                                : pkg.name === "Mingguan"
                                ? "text-blue-400"
                                : "text-purple-400"
                            } mb-2">
                                Rp ${pkg.price.toLocaleString("id-ID")}
                            </div>
                            <p class="text-gray-400">per ${pkg.name.toLowerCase()}</p>
                        </div>
                        
                        <!-- Features List -->
                        <div class="space-y-3 mb-8">
                            <div class="flex items-center">
                                <span class="${
                                  pkg.name === "Harian"
                                    ? "text-green-400"
                                    : pkg.name === "Mingguan"
                                    ? "text-blue-400"
                                    : "text-purple-400"
                                } mr-3">✓</span>
                                <span class="text-gray-300">PlayStation 5 + ${
                                  pkg.controllers
                                } Controller</span>
                            </div>
                            <div class="flex items-center">
                                <span class="${
                                  pkg.name === "Harian"
                                    ? "text-green-400"
                                    : pkg.name === "Mingguan"
                                    ? "text-blue-400"
                                    : "text-purple-400"
                                } mr-3">✓</span>
                                <span class="text-gray-300">${pkg.games} Game${
      pkg.games === "Unlimited" ? "s" : " Pilihan"
    }</span>
                            </div>
                            <div class="flex items-center">
                                <span class="${
                                  pkg.name === "Harian"
                                    ? "text-green-400"
                                    : pkg.name === "Mingguan"
                                    ? "text-blue-400"
                                    : "text-purple-400"
                                } mr-3">✓</span>
                                <span class="text-gray-300">${
                                  pkg.duration
                                } Rental</span>
                            </div>
                            <div class="flex items-center">
                                <span class="${
                                  pkg.name === "Harian"
                                    ? "text-green-400"
                                    : pkg.name === "Mingguan"
                                    ? "text-blue-400"
                                    : "text-purple-400"
                                } mr-3">✓</span>
                                <span class="text-gray-300">${
                                  pkg.name === "Bulanan"
                                    ? "VIP Support 24/7"
                                    : "Antar Jemput"
                                }</span>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex space-x-3">
                            <button onclick="editPackage(${
                              pkg.id
                            })" class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 px-4 py-3 rounded-xl text-sm font-semibold hover-scale transition-all duration-300 flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit
                            </button>
                            <button onclick="deletePackage(${
                              pkg.id
                            })" class="flex-1 bg-gradient-to-r from-red-600 to-red-700 px-4 py-3 rounded-xl text-sm font-semibold hover-scale transition-all duration-300 flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Hapus
                            </button>
                        </div>
                        
                        <!-- Package Status Badge -->
                        <div class="absolute top-4 right-4">
                            <span class="bg-green-500 text-white text-xs px-3 py-1 rounded-full font-semibold">
                                AKTIF
                            </span>
                        </div>
                    </div>
                `;
    packagesGrid.appendChild(card);
  });
}

function updateOrderStatus(orderId) {
  const order = orders.find((o) => o.id === orderId);
  if (order) {
    const statuses = ["Pending", "Aktif", "Selesai"];
    const currentIndex = statuses.indexOf(order.status);
    const nextIndex = (currentIndex + 1) % statuses.length;
    order.status = statuses[nextIndex];
    updateDashboard();
  }
}

function deleteOrder(orderId) {
  if (confirm("Yakin ingin menghapus pesanan ini?")) {
    orders = orders.filter((o) => o.id !== orderId);
    updateDashboard();
  }
}

function addPackage() {
  const name = prompt("Nama paket:");
  const price = parseInt(prompt("Harga:"));
  const duration = prompt("Durasi:");
  const controllers = parseInt(prompt("Jumlah controller:"));
  const games = prompt("Jumlah games:");

  if (name && price && duration && controllers && games) {
    const newPackage = {
      id: packages.length + 1,
      name,
      price,
      duration,
      controllers,
      games,
    };
    packages.push(newPackage);
    updateDashboard();
  }
}

function editPackage(packageId) {
  const pkg = packages.find((p) => p.id === packageId);
  if (pkg) {
    const name = prompt("Nama paket:", pkg.name);
    const price = parseInt(prompt("Harga:", pkg.price));
    const duration = prompt("Durasi:", pkg.duration);
    const controllers = parseInt(prompt("Jumlah controller:", pkg.controllers));
    const games = prompt("Jumlah games:", pkg.games);

    if (name && price && duration && controllers && games) {
      pkg.name = name;
      pkg.price = price;
      pkg.duration = duration;
      pkg.controllers = controllers;
      pkg.games = games;
      updateDashboard();
    }
  }
}

function deletePackage(packageId) {
  if (confirm("Yakin ingin menghapus paket ini?")) {
    packages = packages.filter((p) => p.id !== packageId);
    updateDashboard();
  }
}

function exportOrders() {
  // Simple CSV export simulation
  let csvContent = "data:text/csv;charset=utf-8,";
  csvContent += "ID,Nama,Paket,Tanggal,Status,WhatsApp\n";

  orders.forEach((order) => {
    csvContent += `${order.id},${order.name},${order.package},${order.date},${order.status},${order.phone}\n`;
  });

  const encodedUri = encodeURI(csvContent);
  const link = document.createElement("a");
  link.setAttribute("href", encodedUri);
  link.setAttribute("download", "orders.csv");
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute("href"));
    if (target) {
      target.scrollIntoView({
        behavior: "smooth",
        block: "start",
      });
    }
  });
});

// Set minimum date for booking form
document.addEventListener("DOMContentLoaded", function () {
  const today = new Date().toISOString().split("T")[0];
  document.querySelector('input[name="date"]').setAttribute("min", today);
});

const heroContent = [
  {
    title: 'Sewa <span class="text-gradient">PlayStation</span> Terbaik',
    description:
      "Nikmati pengalaman gaming terdepan dengan layanan rental PlayStation profesional. Konsol terbaru, game terlengkap, harga terjangkau.",
    image:
      "https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=600&h=400&fit=crop",
    alt: "PlayStation 5",
    buttonText: "Lihat Paket",
  },
  {
    title: 'Gaming <span class="text-gradient">Premium</span> Experience',
    description:
      "Rasakan sensasi bermain game dengan kualitas 4K dan teknologi terdepan. Koleksi game eksklusif dan multiplayer seru menanti Anda.",
    image:
      "https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=600&h=400&fit=crop",
    alt: "Gaming Controller",
    buttonText: "Mulai Gaming",
  },
  {
    title: 'Rental <span class="text-gradient">Fleksibel</span> & Mudah',
    description:
      "Sistem rental yang mudah dan fleksibel sesuai kebutuhan Anda. Harian, mingguan, atau bulanan dengan layanan antar-jemput gratis.",
    image:
      "https://images.unsplash.com/photo-1511512578047-dfb367046420?w=600&h=400&fit=crop",
    alt: "Gaming Setup",
    buttonText: "Pesan Sekarang",
  },
  {
    title: 'Game <span class="text-gradient">Terlengkap</span> 2025',
    description:
      "Akses ke ribuan judul game terbaru dan terpopuler. Dari action, adventure, sport, hingga game family yang cocok untuk semua usia.",
    image:
      "https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?w=600&h=400&fit=crop",
    alt: "Game Collection",
    buttonText: "Lihat Game",
  },
];

let currentIndex = 0;
const heroTitleEl = document.getElementById("heroTitle");
const heroDescriptionEl = document.getElementById("heroDescription");
const mainImageEl = document.getElementById("mainImage");
const primaryButtonEl = document.getElementById("primaryButton");
const heroContentEl = document.getElementById("heroContent");
const heroImageEl = document.getElementById("heroImage");

function updateHeroContent() {
  // Fade out
  heroContentEl.classList.add("fade-out");
  heroImageEl.classList.add("fade-out");

  setTimeout(() => {
    // Update content
    const content = heroContent[currentIndex];
    heroTitleEl.innerHTML = content.title;
    heroDescriptionEl.textContent = content.description;
    mainImageEl.src = content.image;
    mainImageEl.alt = content.alt;
    primaryButtonEl.textContent = content.buttonText;

    // Fade in
    heroContentEl.classList.remove("fade-out");
    heroImageEl.classList.remove("fade-out");

    // Move to next content
    currentIndex = (currentIndex + 1) % heroContent.length;
  }, 400); // Half of transition duration
}

// Start the rotation
setInterval(updateHeroContent, 5000);

// Placeholder functions for buttons
function scrollToSection(section) {
  console.log("Scrolling to:", section);
}

function openWhatsApp() {
  console.log("Opening WhatsApp");
}
