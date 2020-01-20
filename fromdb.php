<?php
$conn = mysqli_connect('localhost','root',"",'usersdb');
extract($_POST);

if(isset($_POST['readrecords'])){

	$data =  '<table class="table table-bordered table-striped ">
						<tr class="bg-dark text-white">
                            <th>ID</th>
                            <th>ФИО</th>
							<th>Логин</th>
                            <th>Почта</th>
                            <th>Телефон</th>
							<th>Действие</th>
						</tr>'; 

	$displayquery = " SELECT * FROM `users` "; 
	$result = mysqli_query($conn,$displayquery);

	if(mysqli_num_rows($result) > 0){

		$number = 1;
		while ($row = mysqli_fetch_array($result)) {
			
			$data .= '<tr>  
				<td>'.$row['id'].'</td>
				<td>'.$row['fio'].'</td>
				<td>'.$row['username'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['phone_number'].'</td>
				<td>
					<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Удалить</button>
				</td>
    		</tr>';
    		$number++;

		}
	} 
	 $data .= '</table>';
    	echo $data;

}


if(isset($_POST['id']) && isset($_POST['fio']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone_number']))
{
	$query = " INSERT INTO `users`(`id`, `fio`, `username`, `email`, `phone_number`) VALUES ( '$id','$fio','$username','$email','$phone_number' ) ";
	mysqli_query($conn,$query);

}

if(isset($_POST['deleteid']))
{
	$user_id = $_POST['deleteid']; 
    $deletequery = " DELETE FROM users WHERE id ='$user_id' ";
	if (!$result = mysqli_query($conn,$deletequery)) {
        exit(mysqli_error());

}

}
?>