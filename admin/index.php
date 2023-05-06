<?php require "header.php"; ?>

<div class="container" style="margin-top:30px">


    <!--====== START: Search Box =======-->
    <form id="search-box">
    <div class="row search-box">
        <div class="col-md-2">
            <label for="from-date" class="col-sm-12 col-form-label text-right">From Date: </label>
        </div>
        <div class="col-md-3">
            <input type="date" class="form-control" id="from-date" placeholder="From Date" name="from_date" value="">
        </div>
        <div class="col-md-2">
            <label for="to-date" class="col-sm-12 col-form-label text-right">To Date: </label>
        </div>
        <div class="col-md-3">
            <input type="date" class="form-control" id="to-date" placeholder="To Date" name="to_date" value="">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </form>
    <!--====== END: Search Box =======-->





    <!--====== START: Total Daily vs Average Cost Line Chart =======-->
    <div class="row">
        <div class="col-md-12">
            <canvas id="lineChart"></canvas>
        </div>
    </div>
    <!--====== END: Total Daily vs Average Cost Line Chart =======-->




    <!--====== START: Line Break =======-->
    <div class="row">
        <div class="col-md-12">
            <hr style="border: 1px solid inset;">
        </div>
    </div>
    <!--====== END: Line Break =======-->







    <!--====== START: CASH in Hand + Withdraw =======-->
    <div class="row">
        <!--====== START: CASH in Hand =======-->
        <div class="col-md-6">
        <h5 class="text-center daily-cost">CASH in Hand</h5>
            <table id="cash-table" class="table table-striped">
            </table>
        </div>
        <!--====== END: CASH in Hand =======-->

        <!--====== START: Withdraw =======-->
        <div class="col-md-6">
        <h5 class="text-center daily-cost">Withdraw</h5>
            <table id="withdraw-table" class="table table-striped">
            </table>
        </div>
        <!--====== END: Withdraw =======-->
    </div>
    <!--====== END: CASH in Hand + Withdraw =======-->





    <!--====== START: Category wise Bar Chart =======-->
    <h5 class="text-center daily-cost">Category wish Withdraw Amount Cost</h5>
    <div class="row">
        <div class="col-md-4">
            <table id="categoryTable" class="table table-striped">
            </table>
        </div>
        <div class="col-md-8">
        <canvas id="categoryBarChart"></canvas>
        </div>
    </div>
    <!--====== END: Category wise Bar Chart =======-->
    




    <!--====== START: Line Break =======-->
    <div class="row">
        <div class="col-md-12">
            <hr style="border: 1px solid inset;">
        </div>
    </div>
    <!--====== END: Line Break =======-->




    <!--====== START: Credit Card Bill Pie Chart =======-->
    <h5 class="text-center daily-cost">Credit Card Bill</h5>
    <div class="row">
        <div class="col-md-8">
            <canvas id="CreditPieChart"></canvas>
        </div>
        <div class="col-md-4">
            <table id="CreditTable" class="table table-striped">        
            </table>
        </div>
    </div>
    <!--====== END: Credit Card Bill Pie Chart =======-->





    <!--====== START: Payment Type Pie Chart =======-->
    <h5 class="text-center daily-cost">Payment Type</h5>
    <div class="row">
        <div class="col-md-8">
            <canvas id="PaymentPieChart"></canvas>
        </div>
        <div class="col-md-4">
            <table id="PaymentTable" class="table table-striped">        
            </table>
        </div>
    </div>
    <!--====== END: Payment Type Pie Chart =======-->





    <!--====== START: Daily Cost =======-->
    <h5 class="text-center daily-cost">Daily Cost-
        <span id="total-cost"></span>
    </h5>
    <div class="row">
        <div class="col-md-12">
            <table id="dailyTable" class="table table-striped">

            </table>
        </div>
    </div>
    <!--====== START: Daily Cost =======-->   

</div>

<?php require "footer.php"; ?>

<script type="text/javascript">


 

/*-------- START: pie Chart --------*/
/*var ctx = document.getElementById('CreditPieChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Item A', 'Item B', 'Item C', 'Item D', 'Item E'],
            datasets: [{
                label: 'Cost',
                data: [20, 15, 30, 25, 10],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],

                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'

                ],
                borderWidth: 1
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,
            title: {
                display: true,
                text: 'Cost Breakdown'
            }
        }
    });*/
/*-------- End: pie Chart ----------*/
</script>

