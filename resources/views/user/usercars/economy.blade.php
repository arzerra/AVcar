<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div>

        <div style="display: flex; justify-content: center; gap: 20px;">
            <a href="{{ route('economy') }}">
                <button class="categorybutton active">Economy</button>
            </a>
            <a href="{{ route('compact') }}">
                <button class="categorybutton">Compact</button>
            </a>
            <a href="{{ route('fullsize') }}">
                <button class="categorybutton">Full-Size</button>
            </a>
            <a href="{{ route('luxury') }}">
                <button class="categorybutton">Luxury</button>
            </a>
            <a href="{{ route('suv') }}">
                <button class="categorybutton">SUV</button>
            </a>
            <a href="{{ route('van') }}">
                <button class="categorybutton">VAN</button>
            </a>
            <a href="{{ route('sports') }}">
                <button class="categorybutton">Sports</button>
            </a>
            <a href="{{ route('truck') }}">
                <button class="categorybutton">Truck</button>
            </a>
            <a href="{{ route('ecars') }}">
                <button class="categorybutton">E-Cars</button>
            </a>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
            
            <div class="bg-white dark:bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-800 dark:text-gray-200 text-center text-3xl">
                    {{ __("Economy") }}
                </div>
            </div>
            
        </div>

        <div class="relative flex flex-col items-center justify-center mt-4 mb-4 selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main>
                    <div id="cards-container" class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 lg:gap-6"></div>

                    <div class="mt-6 flex justify-between w-full max-w-md mx-auto">
                        <button id="prev-btn" class="boton-elegante flex items-center" disabled>
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5l-7 7 7 7" />
                            </svg>
                            Previous
                        </button>
                        <button id="next-btn" class="boton-elegante flex items-center">
                            Next
                            <svg class="w-5 h-5 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </main>
            </div>
        </div>

    </div>


        <script>
document.addEventListener("DOMContentLoaded", () => {
    const cards = [
        { title: "Toyota Vios", 
        imgSrc: "car1.png", 
        seating: "Seating: 5 People", 
        fueltype: "Fuel Type: Gasoline", 
        tankcaps: "Tank Caps.: 42L", 
        stocks: 0, 
        trans: "Trans: Automatic", 
        rental: "Rental: ₱750/Day" },

        { title: "Mitsubishi Mirage", 
        imgSrc: "car2.png", 
        seating: "Seating: 5 People", 
        fueltype: "Fuel Type: Gasoline", 
        tankcaps: "Tank Caps.: 40L", 
        stocks: 0, 
        trans: "Trans: Manual", 
        rental: "Rental: ₱600/Day" },

        { title: "Honda City", 
        imgSrc: "car3.png", 
        seating: "Seating: 5 People", 
        fueltype: "Fuel Type: Gasoline", 
        tankcaps: "Tank Caps.: 42L", 
        stocks: 0, 
        trans: "Trans: Automatic", 
        rental: "Rental: ₱800/Day" },

        { title: "Suzuki Alto", 
        imgSrc: "car4.png", 
        seating: "Seating: 4 People", 
        fueltype: "Fuel Type: Gasoline", 
        tankcaps: "Tank Caps.: 35L", 
        stocks: 0, 
        trans: "Trans: Automatic", 
        rental: "Rental: ₱450/Day" }
    ];

    let currentPage = 1;
    const cardsPerPage = 3;

    function renderCards(page) {
        const start = (page - 1) * cardsPerPage;
        const end = page * cardsPerPage;
        const cardsToDisplay = cards.slice(start, end);

        const cardsContainer = document.getElementById('cards-container');
        cardsContainer.innerHTML = '';

        cardsToDisplay.forEach(card => {
            const cardHTML = `
            <a href="javascript:void(0)" class="block" data-car="${card.title}">
                <div id="docs-card" class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                    <div id="screenshot-container" class="relative flex w-full flex-5 items-stretch">
                        <img src="{{ asset('images/car-pic-categories/economy/${card.imgSrc}') }}" width="500" alt="AV Logo" />
                    </div>
                    <div class="relative flex items-center gap-6 lg:items-end">
                        <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                            <div class="pt-3 sm:pt-5 lg:pt-0">
                                <h2 class="text-xl font-semibold text-white dark:text-white">${card.title}</h2>
                                <div class="mt-3 text-sm/relaxed text-white dark:text-white grid grid-cols-2 gap-x-4">
                                    <p>
                                        <b>${card.seating}</b><br>
                                        <b>${card.tankcaps}</b><br>
                                        <b>${card.trans}</b>
                                    </p>
                                    <p>
                                        <b>${card.fueltype}</b><br>
                                        <b>${card.stocks > 0 ? `Stocks: ${card.stocks}` : "Out of Stock "}</b><br>
                                        <b>${card.rental}</b>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            `;

            cardsContainer.innerHTML += cardHTML;
        });

        document.getElementById('prev-btn').disabled = page === 1;
        document.getElementById('next-btn').disabled = page * cardsPerPage >= cards.length;
    }

    document.getElementById('prev-btn').addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            renderCards(currentPage);
        }
    });

    document.getElementById('next-btn').addEventListener('click', () => {
        if (currentPage * cardsPerPage < cards.length) {
            currentPage++;
            renderCards(currentPage);
        }
    });

    fetch('/carstock')
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to fetch car stocks');
            }
            return response.json();
        })
        .then(data => {
            cards.forEach(card => {
                const stock = data.find(item => item.carName === card.title);
                if (stock) {
                    card.stocks = stock.carCount;
                } else {
                    card.stocks = 0;
                }
            });

            renderCards(currentPage);
        })
        .catch(error => console.error('Error fetching car stocks:', error));

    document.getElementById('cards-container').addEventListener('click', (event) => {
        const card = event.target.closest('#docs-card');
        if (card) {
            const cardTitle = card.querySelector('h2').textContent; // Get car title
            const clickedCard = cards.find(item => item.title === cardTitle); // Find the clicked card

            // Check if the car is out of stock
            if (clickedCard.stocks <= 0) {
                // Show alert if out of stock
                alert(`${clickedCard.title} is out of stock!`);
                event.preventDefault(); // Prevent the redirection
            } else {
                // Redirect to rentprocess route with the carName in query params
                window.location.href = `/rentprocess?carName=${encodeURIComponent(cardTitle)}`;
            }
        }
    });

    renderCards(currentPage);
});

    </script>
    
    <script src="{{ asset('js/your-script.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                <script>
            $(document).ready(function() {

                $('#datepicker').flatpickr({
                    dateFormat: "Y-m-d",  
                });
            });
        </script>

        <script>

    const today = new Date();
    
    const formattedDate = today.toISOString().split('T')[0];

    document.getElementById("todays-date").value = formattedDate;
</script>

</x-app-layout>
