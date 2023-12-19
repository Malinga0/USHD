<?php
include("include/header.php");
?>

<?php
include("uhsdcon.php");

$st=mysqli_fetch_assoc(mysqli_query($conn, "select count(user_id) as total from user where position=1"))['total'];
$te=mysqli_fetch_assoc(mysqli_query($conn, "select count(user_id) as total from user where position=2"))['total'];
$ad=mysqli_fetch_assoc(mysqli_query($conn, "select count(id) as total from admin"))['total'];


?>

<div class='row justify-content-center mt-5'>
<div class='bg-primary rounded-3 text-center m-2 p-0' style='width:180px;background-image:linear-gradient(#27b7ff, #a9cbff);'>
<div class="mt-3">Students</div>
<div class="fs-1 fw-bold"><?php echo $st;?></div>
<div class="w-100" style="background-color:rgba(255,255,255,0.4);width:100%;height:25px;">
</div>
</div>

<div class='bg-primary rounded-3 text-center m-2 p-0' style='width:180px;background-image:linear-gradient(#f7689d, #f7d5d5);'>
<div class="mt-3">Teachers</div>
<div class="fs-1 fw-bold"><?php echo $te;?></div>
<div class="w-100" style="background-color:rgba(255,255,255,0.4);width:100%;height:25px;">
</div>
</div>

<div class='bg-primary rounded-3 text-center m-2 p-0' style='width:180px;background-image:linear-gradient(#00f4a5, #a6ffcd);'>
<div class="mt-3">Admins</div>
<div class="fs-1 fw-bold"><?php echo $ad;?></div>
<div class="w-100" style="background-color:rgba(255,255,255,0.4);width:100%;height:25px;">
</div>
</div>

<div class='bg-primary rounded-3 text-center m-2 p-0' style='width:180px;background-image:linear-gradient(#f499ff, #d1abec);'>
<div class="mt-3">Departments</div>
<div class="fs-1 fw-bold">4</div>
<div class="w-100" style="background-color:rgba(255,255,255,0.4);width:100%;height:25px;">
</div>
</div>
</div>

<div class='p-1 p-md-5'>
<div class='bg-white rounded-2 shadow-sm'>
<div id='dt' class="text-center p-2"></div>
<select id='days' onchange="updatetable()" class="mx-5 border border-1">
<option value="30">last month</option>
<option value="15">last 15 days</option>
<option value="5">last 5 days</option>
</select>
<canvas id="myChart" class="w-100 p-1 p-md-5 d-relative"></canvas>
</div>
</div>

<script>
<?php
$result=mysqli_query($conn, "SELECT CURRENT_TIMESTAMP() as date");
$data=mysqli_fetch_assoc($result);
$date=$data['date'];


$d=(int)substr($date, 8,10);
$m=(int)substr($date,5,7);
$y=(int)substr($date,0,4);
$range= $y."-".$m."-".$d." ";
$xv="var xval=[";
echo "var data=[";
for($x=0; $x<30; $x++){
	if($m<10){
		$mv="0";
	}
	else{
		$mv="";
	}
	if($d < 10){
		$dv="0";
	}
	else{
		$dv="";
	}
	$date=$y."-".$mv.$m."-".$dv.$d;
	$result=mysqli_query($conn, "SELECT count(log_id) as total from userlog where login_date like '%".$date."%'");
	$data=mysqli_fetch_assoc($result);
	echo $data['total'].",";
	$xv=$xv."'".month($m)."-".$d."',";
	$d--;
	if($d==0){
		$m--;
		if($m==0){
			$m=12;
			$y--;
		}
		$d=cal_days_in_month(CAL_GREGORIAN,$m,$y);
	}
	
}
$range="$('#dt').html('Traffic from ".$y."-".$m."-".$d." To ".$range."');\n";

$xv=$xv."];";
echo "];";
echo $range;
echo $xv;

function month($mval){
	switch ($mval) {
	case 1:
		$month = 'Jan';
		break;
	case 2:
		$month = 'Feb';
		break;

	case 3:
		$month = 'Mar';
		break;
	case 4:
		$month = 'Apr';
		break;
	case 5:
		$month = 'May';
		break;
	case 6:
		$month = 'Jun';
		break;
	case 7:
		$month = 'Jul';
		break;
	case 8:
		$month = 'Aug';
		break;
	case 9:
		$month = 'Sep';
		break;
	case 10:
		$month = 'Oct';
		break;
	case 11:
		$month = 'Nov';
		break;
	case 12:
		$month = 'Dec';
		break;
	default:
		$month = 'Not a valid month!';

		break;
	}
	return $month;
}
?>


data=data.reverse();
xval=xval.reverse();
var xValues = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];
var subxval=xval;
var subdata=data;
var mchart=new Chart("myChart", {
  type: "line",
  pointStyle: false,
  pointRadius:0,
  pointBorderColor:'#ffffff',
  data: {
    labels: subxval,
    datasets: [{ 
      data: subdata,
	  borderColor: '#36A2EB',
	  backgroundColor: '#9BD0F5',
      fill: true,
    }]
  },
  options: {
		elements: {
			point:{
				radius: 0
			}
      },

	  scales: {
        xAxes: [{
            gridLines: {
                color: "rgba(0, 0, 0, 0)",
            }
        }],
        yAxes: [{
            gridLines: {
                color: "rgba(0, 0, 0, 0)",
            }   
        }]
    },
	responsive: true,
    legend: {display: false},
	title: {
        display: true,
        text: 'User Traffic\n\n'
      },
  }
});

function updatetable(){
console.log("updatetttt");
mchart.data.labels=xval.slice(30-$('#days').val(), 30);
mchart.data.datasets[0].data=data.slice(30-$('#days').val(),30);
console.log(mchart.data.datasets[0].data);
console.log(mchart.data.labels);
mchart.update();

}
</script>
<?php
include("include/footer.php");
?>





