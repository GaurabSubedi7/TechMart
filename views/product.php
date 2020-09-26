<!DOCTYPE html>
<html>
 <head>
  <title>AngularJS Live Data Search using PHP Mysql</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
  <style>
  .form_style
  {
   width: 600px;
   margin: 0 auto;
  }
  </style>
 </head>
 <body>
  
  <div class="container" ng-app="live_search_app" ng-controller="live_search_controller" ng-init="fetchData()">
   <br />
   <h3 align="center">AngularJS Live Data Search using PHP Mysql</h3>
   <br />
   <div >
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_query" ng-model="search_query" ng-keyup="fetchData()" placeholder="Search by Customer Details" class="form-control" />
    </div>
   </div>
   <br />
   <table class="table table-striped table-bordered">
    <thead>
     <tr>
      <th>Name</th>
      <th>description</th>
      <th>price</th>
      
     </tr>
    </thead>
    <tbody>
     <tr ng-repeat="data in searchData">
      <td>{{ data.product_name }}</td>
      <td>{{ data.product_description }}</td>
      <td>{{ data.product_price }}</td>
      
     </tr>
    </tbody>
   </table>
  </div>
  
 </body>
</html>

<script>
var app = angular.module('live_search_app', []);
app.controller('live_search_controller', function($scope, $http){
 $scope.fetchData = function(){
  $http({
   method:"POST",
   url:"http://localhost/ag/fetch.php",
   data:{search_query:$scope.search_query}
  }).success(function(data){
   $scope.searchData = data;
  });
 };
});
</script>
