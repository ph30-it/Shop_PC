<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danh sách người dùng</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
#navbar{
	margin-top:50px;}
#tbl-first-row{
	font-weight:bold;}
#logout{
	padding-right:30px;}
	
</style>
</head>
<body>

<div class="container">
    <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Người dùng</h1>
            </div>
        </div>
    <div id="navbar" class="row">
    	<div class="col-sm-12">
        	<nav class="navbar navbar-default">
  				<div class="container-fluid">
                	<ul class="nav navbar-nav">
                        <li><a href="{{asset('admin/home')}}">Home</a></li>
                        <li><a href="{{asset('admin/user')}}">Users</a></li>
                        <li><a href="{{asset('admin/user/add')}}">Add user</a></li>
                	</ul>
                    <p id="logout" class="navbar-text navbar-right"><a class="navbar-link" href="{{asset('admin/home')}}">Logout</a></p>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
    	<div class="col-sm-12">
        	<!-- <div class="alert alert-success">Added user success!</div> -->
        	<table class="table table-striped">
            	<tr id="tbl-first-row">
                	<td width="5%">ID</td>
                    <td width="30%">Fullname</td>
                    <td width="25%">Username</td>
                    <td width="25%">Email</td>
                    <td width="5%">Level</td>
                    <td width="5%">Edit</td>
                    <td width="5%">Delete</td>
                </tr>
                @foreach($userlist as $user)
                <tr>
                	<td>{{$user->id}}</td>
                    <td>{{$user->fullname}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->level}}</td>
                    <td><a href="{{asset('admin/user/edit/'.$user->id)}}">Edit</a></td>
                    <td><a onclick="return confirm('Bạn có chắc chắc muốn xóa?')" href="{{asset('admin/user/delete/'.$user->id)}}">Delete</a></td>
               </tr>
               @endforeach
			</table>
        </div>
    </div>
</div>

</body>
</html>
