<x-shop>
    <div class="col-sm-5 shadow sm:rounded-lg border-gray-100" style="display: block;margin: 80px auto 50px auto">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" >
                <div class="carousel-item active">
                    <img
                        src="{{URL::asset('Images/slider2.png')}}"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img
                        src="{{URL::asset('Images/slider1.png')}}"
                        class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="false" style="background-color: #1a202c"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="false" style="background-color: #1a202c"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</x-shop>
