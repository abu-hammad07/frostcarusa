<?php
include './config/config.php';
require './function/function.inc.php';
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
    header('location: login.php');
    exit;
}
if (!isset($_SESSION['user_fullname'])) {
    echo "You are logged out";
    header('location:login.php');
}
include "./includes/header.php";
include "./includes/serchform.php";
include "./includes/navbar.php";
include "./includes/sidebar.php";
?>
<div class="container-fluid ">
    <div class="card  mt-5 py-5">
        <div class="row mx-3 ">
        <h3 class="text-center">OPERATING INSTRUCTIONS</h3>
                <div class="col-lg-6 mt-4">
                    <div class="card border-0 shadow pb-1 ">
                        <div class="box p-0">
                            <button class="bg-primary  border-0  px-4 py-2 text-light fw-bolder " style=" border-radius:0 0 10px 0px;">1</button>
                        </div>
                        <div class="cof p-4 pb-5">
                            <h6 class="fs-6 mb-3">TURN SWITCH TO START(II) POSITION TO TURN COMPRESSOR ON</h6>
                            <p>(Parked/Stationary) This will start the compressor and allow the refrigerant to circulate. The eutectic solution inside the holdover plates will start the process of making the unit reach the desired temperature.</p>
                        </div>
                    </div>
                </div>
            <div class="col-lg-6 mt-4 ">
                <div class="card border-0 shadow pb-5 ">
                    <div class="box p-0">
                        <button class="bg-primary  border-0  px-4 py-2 text-light fw-bolder " style=" border-radius:0 0 10px 0px;">2</button>
                    </div>
                    <div class="cof p-4 pb-4">
                        <h6 class="fs-6 mb-3"> TURN SWITCH TO STOP (O) POSITION TO TURN COMPRESSOR OFF</h6>
                        <p>(Start Delivery Route) This turns off the compressor, however the eutectic holdover plates maintain frozen temperature for 10 to 12 hours.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-4">
                <div class="card border-0 shadow  ">
                    <div class="box p-0">
                        <button class="bg-primary  border-0  px-4 py-2 text-light fw-bolder " style=" border-radius:0 0 10px 0px;">3</button>
                    </div>
                    <div class="cof p-4 ">
                        <h6 class="fs-6 mb-3">TURN SWITCH FROM STOP(O) POSITION TO PUMP DOWN (I) POSITION</h6>
                        <p>This brings the refrigerant back into storage tank before unplugging the unit. Do this before going on delivery route, so the refrigerant can recycle back into storage tank. This helps in extending compressor life.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-4">
                <div class="card border-0 shadow  ">
                    <div class="box p-0">
                        <button class="bg-primary  border-0  px-4 py-2 text-light fw-bolder " style=" border-radius:0 0 10px 0px;">4</button>
                    </div>
                    <div class="cof p-4 ">
                        <h6 class="fs-6 mb-3">DEFROST EUTECTIC SYSTEM: To melt ice buildup on the holdover plates when exceeds over 1/2</h6>
                        <p>accumulation. Open all the doors and unload the products and let the holdover (eutectic) plates defrost. Do not use hot water or scrape the plates. After holdover plates defrost, the unit can be turned on.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "./includes/footer.php";
?>