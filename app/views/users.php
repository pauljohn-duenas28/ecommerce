<?php require_once '../partials/template.php'; ?>

<?php function get_page_content(){
	if((isset($_SESSION['user'])) && $_SESSION['user']['role_id'] == 1) {
	global $conn;
	?>
	
	<div class="container">
		<h4 class="text-center">User Admin Page</h4>
		<div class="row">
			<div class="col-sm-12 offset-sm-2">
				<table class="table table-responsive table-striped">
				<thead class="text-center">
					<tr>
						<td> Username</td>
						<td> First Name</td>
						<td> Lastname</td>
						<td> Email</td>
						<td> Role</td>
						<td> Action</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$user_details = "SELECT u.id, u.firstname, u.lastname, u.username, u.email, r.role AS user_role FROM users u JOIN roles r ON(u.roles_id = r.id);";
						$user_result = mysqli_query($conn, $user_details);
						foreach($user_result as $user_results){ ?>
							<tr>
	                      		<td><?php echo $user_results['username']; ?></td>
	                      		<td><?php echo $user_results['firstname']; ?></td>
	                      		<td><?php echo $user_results['lastname']; ?></td>
	                      		<td><?php echo $user_results['email']; ?></td>
	                      		<td><?php echo $user_results['user_role']; ?></td>

	                      		<td>
	                      			<?php
	                      				$id = $user_results['id'];
	                      				if($user_results['user_role'] == 'admin'){
	                      					echo "<a href='../controllers/grant_admin.php?id=$id' class='btn btn-danger'>Revoke Admin</a>";
	                      				}else{
	                      					echo "<a href='../controllers/grant_admin.php?id=$id' class='btn btn-primary'>Make Admin</a>";
	                      				}
	                      			?>
	                      		</td>
	                      
	                      	</tr>				
					<?php }; ?>		
				</tbody> <!-- end tbody -->
				</table> <!-- end table -->
			</div> <!-- end col -->
		</div> <!-- end row -->
	</div> <!-- end container -->

<?php }else{
	header('location: ./error.php');
} ?>

<?php }; ?>
