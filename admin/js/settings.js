$(document).ready(function() {
    $('#word-list').DataTable();
} );


// Disable form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Get the forms we want to add validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            //console.log("submitted");
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();



// Add and Edit operation
$(function () {
  $('#save-one').on('submit', function (e) {
    e.preventDefault();
    var type = $(this).data("type");
    var table = $(this).data("table");
    //console.log("table="+table);
    //console.log("data="+$('form').serialize());
    var url = (type=="Update") ? 'database.php?page='+table+'&action=update' : 'database.php?page='+table+'&action=insert';
    $.ajax({
      type: 'post',
      dataType: "json",
      url: url,
      data: $('form').serialize(),
      success: function (data) {
        if(data.result=="failed"){
          $("#operation-result").css("display", "block");
          $("#operation-result").removeClass("alert-success");
          $("#operation-result").addClass("alert-danger");
          $("#operation-result").html("<strong>"+data.result+"!</strong> <i>"+data.message+"</i> because of <b>"+data.msg+"</b>");
          toastr.error('Data not '+type+'!', 'Data!')
        }else{
          $("#operation-result").css("display", "block");
          $("#operation-result").removeClass("alert-danger");
          $("#operation-result").addClass("alert-success");
          $("#operation-result").html("<strong>"+data.result+"!</strong> <i>"+data.message+"</i> because of <b>"+data.msg+"</b>");
          toastr.success('Data successfully '+type+'!', 'Data');
        }

        if(type=="Add"){
          $("#save-one").removeClass("was-validated");
          $('#name').val("");
          $('#sname').val("");
        }
      },
      fail: function(xhr, textStatus, errorThrown){
          toastr.error('Request Failed.', 'Failed!')
      }
    });
  });

});




 
//Delete Operation
function deleteData(id, table) {
  //console.log("Delete id: ",id);
  //console.log("Delete TABLE: ",table);
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })
  
  swalWithBootstrapButtons.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true,
    preConfirm: (login) => {
      return fetch('database.php?page='+table+'&action=delete&id='+id)
        .then(response => {
          if (!response.ok) {
            throw new Error(response.statusText)
          }
          return response.json()
        })
        .catch(error => {
          Swal.showValidationMessage(
            `Request failed: ${error}`
          )
        })
    },
    allowOutsideClick: () => !Swal.isLoading()
  }).then((result) => {
    if (result.isConfirmed) {
      swalWithBootstrapButtons.fire('Deleted!', 'Your file has been deleted.','success')
    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
    swalWithBootstrapButtons.fire('Cancelled', 'Your data is safe :)', 'error')
    }
  })
}




//Update Budget Data
function UpdateData(name, table, date) {
  //console.log("Name: ",name);
  //console.log("TABLE: ",table);
  let id = name.toLowerCase().replace(/ /g, "-");
  //console.log("ID: ",id);
  var value = $('#'+id+'').val();
  //console.log("Value: ",value);

  /*page=table
  action=update
  name=name
  value=value*/

  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })

  swalWithBootstrapButtons.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, Update it!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true,
    preConfirm: (login) => {
      return fetch('database.php?page='+table+'&action=modify&name='+name+'&value='+value+'&date='+date)
        .then(response => {
          if (!response.ok) {
            throw new Error(response.statusText)
          }
          return response.json()
        })
        .catch(error => {
          Swal.showValidationMessage(
            `Request failed: ${error}`
          )
        })
    },
    allowOutsideClick: () => !Swal.isLoading()
  }).then((result) => {
    if (result.isConfirmed) {
      swalWithBootstrapButtons.fire('Updated!', 'Budget value has been updated.','success')
    } else if (
      // Read more about handling dismissals below
      result.dismiss === Swal.DismissReason.cancel
    ) {
    swalWithBootstrapButtons.fire('Cancelled', 'Your data is safe :)', 'error')
    }
  })
}


// Index Search Box
$(function () {
  $('#search-box').on('submit', function (e) {
    e.preventDefault();
    var url = 'database.php?page=index&action=search';
    $.ajax({
      type: 'post',
      dataType: "json",
      url: url,
      data: $('form').serialize(),
      success: function (response) {
        /*if(data.result=="failed"){
          toastr.error('Data Not Found', 'Search')
        }else{*/
          //var data = JSON.parse(response); // parse response as JSON
          //console.log("Daily Data="+response.daily);
          updateDailyTable(response.daily, response.amount); // update table
          updateLineChart(response.dateData, response.costData); // update line chart
          categoryBarChart(response.category);
          CreditPieChart(response.cards);
          PaymentPieChart(response.payments);
          CashTable(response.cash);
          WithdrawTable(response.withdrawn);
          //toastr.success('Data successfully Found', 'Search');
        //}
      },
      fail: function(xhr, textStatus, errorThrown){
          toastr.error('Request Failed.', 'Failed!')
      }
    });
  });

});



function WithdrawTable(withdrawn){
  var table = $('#withdraw-table');
  table.empty(); // clear existing rows
  var row = '<tr><th>#</th><th>Bank</th><th>Date</th><th>Amount</th></tr>';
  table.append(row);
  for(var i=0; i<withdrawn.length; i++){
    var row = '<tr><td>' + (i+1) + '</td><td>' + withdrawn[i]['bank'] + '</td><td>' + withdrawn[i]['udate'] + '</td><td>' + withdrawn[i]['amount'] + '</td></tr>';
    table.append(row);
  }
}





function CashTable(cash){
  var table = $('#cash-table');
  table.empty(); // clear existing rows
  var row = '<tr><th>#</th><th>Bank</th><th>Date</th><th>Amount</th></tr>';
  table.append(row);
  for(var i=0; i<cash.length; i++){
    var row = '<tr><td>' + (i+1) + '</td><td>' + cash[i]['bank'] + '</td><td>' + cash[i]['udate'] + '</td><td>' + cash[i]['amount'] + '</td></tr>';
    table.append(row);
  }
}






function PaymentPieChart(cards){
  var labels = [];
  var data = [];
  var backgroundColor = [];
  var borderColor = [];
  
  
  for(var i=0; i<cards.length; i++){
    labels.push(cards[i]['bank']);
    data.push(cards[i]['amount']);
    var bgopacity = 0.2;
    var bopacity = 1;
    var bgc = 'rgba('+Math.floor(Math.random() * 256)+', '+Math.floor(Math.random() * 256)+', '+Math.floor(Math.random() * 256)+', ';
    backgroundColor.push(bgc+bgopacity+')');
    borderColor.push(bgc+bopacity+')');
  }
  
  var table = $('#PaymentTable');
  table.empty(); // clear existing rows
  var row = '<tr><th>#</th><th>Payment</th><th>Amount</th></tr>';
  table.append(row);
  for(var i=0; i<cards.length; i++){
    var row = '<tr><td>' + (i+1) + '</td><td>' + cards[i]['bank'] + '</td><td>' + cards[i]['amount'] + '</td></tr>';
    table.append(row);
  }
  
  /*-------- START: pie Chart --------*/
  var ctx = document.getElementById('PaymentPieChart').getContext('2d');
      var chart = new Chart(ctx, {
          type: 'pie',
          data: {
              labels: labels,
              datasets: [{
                  label: 'Cost',
                  data: data,
                  backgroundColor: backgroundColor,
  
                  borderColor: borderColor,
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
      });
  /*-------- End: pie Chart ----------*/
  }






function CreditPieChart(cards){
var labels = [];
var data = [];
var backgroundColor = [];
var borderColor = [];


for(var i=0; i<cards.length; i++){
  labels.push(cards[i]['bank']);
  data.push(cards[i]['amount']);
  var bgopacity = 0.2;
  var bopacity = 1;
  var bgc = 'rgba('+Math.floor(Math.random() * 256)+', '+Math.floor(Math.random() * 256)+', '+Math.floor(Math.random() * 256)+', ';
  backgroundColor.push(bgc+bgopacity+')');
  borderColor.push(bgc+bopacity+')');
}

var table = $('#CreditTable');
table.empty(); // clear existing rows
var row = '<tr><th>#</th><th>Bank</th><th>Amount</th></tr>';
table.append(row);
for(var i=0; i<cards.length; i++){
  var row = '<tr><td>' + (i+1) + '</td><td>' + cards[i]['bank'] + '</td><td>' + cards[i]['amount'] + '</td></tr>';
  table.append(row);
}

/*-------- START: pie Chart --------*/
var ctx = document.getElementById('CreditPieChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels/*['Item A', 'Item B', 'Item C', 'Item D', 'Item E']*/,
            datasets: [{
                label: 'Cost',
                data: data/*[20, 15, 30, 25, 10]*/,
                backgroundColor: backgroundColor/*[
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ]*/,

                borderColor: borderColor/*[
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'

                ]*/,
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
    });
/*-------- End: pie Chart ----------*/
}






function categoryBarChart(category){
  var labels = [];
  var data = [];
  var backgroundColor = [];
  var borderColor = [];


  for(var i=0; i<category.length; i++){
    labels.push(category[i]['category']);
    data.push(category[i]['amount']);
    var bgopacity = 0.2;
    var bopacity = 1;
    var bgc = 'rgba('+Math.floor(Math.random() * 256)+', '+Math.floor(Math.random() * 256)+', '+Math.floor(Math.random() * 256)+', ';
    backgroundColor.push(bgc+bgopacity+')');
    borderColor.push(bgc+bopacity+')');
  }



  var table = $('#categoryTable');
  table.empty(); // clear existing rows
  var row = '<tr><th>Category</th><th>Amount</th><th>Budget</th></tr>';
  table.append(row);
  for(var i=0; i<category.length; i++){
    var row = '<tr><td>' + category[i]['category'] + '</td><td>' + category[i]['amount'] + '</td><td>' + category[i]['budget'] + '</td></tr>';
    table.append(row);
  }


  /*-------- Start: Bar Chart ----------*/
  var ctx = document.getElementById('categoryBarChart').getContext('2d');
  var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels/*['Item A', 'Item B', 'Item C', 'Item D', 'Item E']*/,
        datasets: [{
            label: 'Cost',
            data: data/*[20, 15, 30, 25, 10]*/,
            backgroundColor: backgroundColor/*[
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ]*/,

            borderColor: borderColor/*[
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ]*/,
            borderWidth: 1
        }]
    },

    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
/*-------- End: Bar Chart ----------*/
}






function updateLineChart(date, cost){
  /*-------- Start: Line Chart ----------*/
  var dateData = [];
  var costData = [];
  
  for (var i = 0; i < date.length; i++) {
    dateData.push(date[i]);
    costData.push(cost[i]);
  }

//var dateData = ['2022-01-01', '2022-02-01', '2022-03-01', '2022-04-01', '2022-05-01', '2022-06-01'];
//var costData = [150, 200, 180, 220, 250, 280];

// Calculate average cost data
var avgCostData = [];
var totalCost = 0;
for (var i = 0; i < costData.length; i++) {
    totalCost += costData[i];
    avgCostData.push(totalCost / (i + 1));
}
 
// Create the line chart
var ctx = document.getElementById('lineChart').getContext('2d');
var lineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: dateData,
        datasets: [{
            label: 'Cost',
            data: costData,
            borderColor: 'blue',
            borderWidth: 2,
            fill: false
        }, {
            label: 'Average Cost',
            data: avgCostData,
            borderColor: 'green',
            borderWidth: 2,
            fill: false
        }]
    },

    options: {
        scales: {
            xAxes: [{
                type: 'time',
                time: {
                    unit: 'month',
                    displayFormats: {
                        month: 'MMM YYYY'
                    }
                }
            }],

            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

/*-------- End: Line Chart ----------*/
}



function updateDailyTable(data, amount){

  document.getElementById('total-cost').innerHTML = amount[0]['amount'];
  //console.log("Function="+data)
  var table = $('#dailyTable');
  table.empty(); // clear existing rows

  for(var i=0; i<data.length; i++){
    if(parseInt(data[i]['sn'])==0)
      var row = '<tr style="background-color: rgba(0,0,0,.05);"><th>' + data[i]['date'] + '</th><th></th><th>' + data[i]['amount'] + '</th></tr>';
    else
      var row = '<tr><td>' + data[i]['name'] + '</td><td>' + data[i]['banks_id'] + '</td><td>' + data[i]['amount'] + '</td></tr>';

    table.append(row);
  }
}