import ApexCharts from "apexcharts";

document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.getElementById("navbar");
    // const scrolledClass = "bg-base-200";
    // const scrolledShadow = "shadow-lg";
    // const positionNav = "fixed";
    // const textScrolledClass = "text-white";
    const active = "text-primary";

    const sections = document.querySelectorAll("#body-ko > div[id]");
    const navButtons = document.querySelectorAll(".navbar-end button");

    const scrollHandler = () => {
        // let scrollY = window.scrollY;
        // if (scrollY > 20) {
        //     navbar.classList.add(scrolledClass, scrolledShadow);
        //     // button.classList.remove('text-white');
        // } else {
        //     navbar.classList.add(positionNav);
        //     navbar.classList.remove(scrolledClass, scrolledShadow, "sticky");
        //     // navButtons.forEach(button => {
        //     //     button.classList.add('text-white');
        //     // });
        // }

        sections.forEach((current) => {
            const sectionHeight = current.offsetHeight;
            // Ambil posisi atas section, kurangi tinggi navbar agar lebih akurat
            const sectionTop = current.offsetTop - navbar.offsetHeight;
            const sectionId = current.getAttribute("id");

            // Cek apakah posisi scroll berada di dalam section ini
            if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                // Hapus class 'active-nav' dari SEMUA tombol dulu
                navButtons.forEach((button) => {
                    button.classList.remove(active);
                });

                // Temukan tombol yang ID-nya SESUAI dengan ID section
                // Contoh: section id="jadwal" akan cocok dengan button id="jadwall"
                // Kita menggunakan [id^='...'] yang artinya "id yang diawali dengan..."
                const correspondingButton = document.querySelector(
                    `.navbar-end button[id^='${sectionId}']`
                );

                if (correspondingButton) {
                    // Tambahkan class active ke tombol yang cocok
                    correspondingButton.classList.add(active);
                }
            }
        });
    };

    window.addEventListener("scroll", scrollHandler);
    scrollHandler();
});

var options = {
    chart: {
        type: "donut",
    },
    series: [30, 40, 35, 50],
    labels: ["gedung", "gedung2", "gedung3", "gedung4"],
};

var chart = new ApexCharts(document.querySelector("#homepagechart"), options);

chart.render();
