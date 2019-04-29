<?php 

?>
<h3 class="text-center"> Categories</h3>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Articles</th>
      <th scope="col">edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($viewmodel as $item) : ?>
    <tr>
      <th scope="row"><?php echo $item["name"]?></th>
      <td><a href="<?php echo ROOT_URL.'/shares/posts/'. $item['id'] ?>" >read more</a></td>
      <td><a href="<?php echo ROOT_URL.'/categories/edit/'. $item['id'] ?>" >edit</a></td>
      <td><a href="<?php echo ROOT_URL.'/categories/delete/'. $item['id'] ?>" >Delete</a></td>
     
    </tr>
    <?php endforeach; ?>
  </tbody>
   
</table>
<h3 class="text-center pt-5">Category usage</h3>
<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Category', 'Posts Count'],
<?php
$cat=new ShareModel();

 foreach($viewmodel as $item) : ?>
  
  ['<?php echo $item["name"]?>',
   <?php $catCount=$cat->categoryUsageCount($item["id"]);
    echo $catCount;?>],

  <?php endforeach; ?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Category usage', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>