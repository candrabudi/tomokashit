<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<div class="mt-20">
    <div class="mt-10 h-40 flex items-center justify-between pr-5">
        <div class="text-18 font-bold">Provider Permainan</div>
        <div class="w-80 flex items-center">
            <button
                class="var-button var--box var-button--mini var--inline-flex var-button--icon-container-default w-40 bg-transparent"
                type="button" id="chevron-left">
                <div class="var-button__content">
                    <i class="fas fa-chevron-left text-24" style="transition-duration: 0ms;"></i>
                </div>
                <div class="var-hover-overlay"></div>
            </button>
            <button
                class="var-button var--box var-button--mini var--inline-flex var-button--icon-container-default var-button--disabled w-40 bg-transparent"
                type="button" id="chevron-right" disabled>
                <div class="var-button__content">
                    <i class="fas fa-chevron-right text-24" style="transition-duration: 0ms;"></i>
                </div>
                <div class="var-hover-overlay"></div>
            </button>
        </div>
    </div>

    <div class="mt-10 w-full flex overflow-x-auto scrollbar-hide" id="provider-scroll-container"
        style="cursor: grab; user-select: unset;">

        @foreach ($gameProviders as $gp)
            <div class="mr-10 h-60 w-150 flex-shrink-0 cursor-pointer overflow-hidden rd-10 bg-paper">
                <div class="var-image var--box h-full w-full" style="border-radius: 0px;">
                    <img class="var-image__image" alt="PG"
                        src="{{ $gp->provider_image_desktop }}"
                        style="object-fit: contain; object-position: 50% 50%;">
                        <div class="text-center mt-2 font-bold">{{ $gp->provider_name }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .var-button {
        background: transparent;
        border: none;
        cursor: pointer;
        color: #333;
    }

    .var-button:hover {
        color: #007bff;
    }

    .var-button__content i {
        font-size: 24px;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .rd-10 {
        border-radius: 10px;
    }
</style>

<script>
    const scrollContainer = document.getElementById('provider-scroll-container');
    const leftChevron = document.getElementById('chevron-left');
    const rightChevron = document.getElementById('chevron-right');

    leftChevron.addEventListener('click', function() {
        scrollContainer.scrollBy({
            left: -200,
            behavior: 'smooth'
        });
    });

    rightChevron.addEventListener('click', function() {
        scrollContainer.scrollBy({
            left: 200,
            behavior: 'smooth'
        });
    });

    function updateChevronState() {
        if (scrollContainer.scrollLeft === 0) {
            leftChevron.disabled = true;
        } else {
            leftChevron.disabled = false;
        }

        if (scrollContainer.scrollLeft + scrollContainer.clientWidth >= scrollContainer.scrollWidth) {
            rightChevron.disabled = true;
        } else {
            rightChevron.disabled = false;
        }
    }

    updateChevronState();
    scrollContainer.addEventListener('scroll', updateChevronState);
</script>
