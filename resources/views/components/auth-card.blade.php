<div class="min-vh-100 container-xl py-5">
    <div class="card">
        <div class="card-header border p-1 m-1" style="background-color: #d22630;">
            <div class="row m-1">
                <div class="col-1 p-2">
                </div>
                <div class="col-10 p-2 align-self-center">
                    {{ $logo }}
                </div>
                <div class="col-1 p-2">
                </div>
            </div>
        </div>
        <div class="card-footer border p-1 m-1 text-dark" style="background-color: #ffffff;">
            <div class="row m-5">
                <div class="col-4 m-2">
                </div>
                <div class="col-4 m-2">
                    {{ $slot }}
                </div>
                <div class="col-4 m-2">
                </div>
            </div>
        </div>
    </div>
</div>