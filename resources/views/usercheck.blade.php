<h1>My Form</h1>
<form method="post" action="userformSubmit">
	{{@csrf_field()}}
	<table>
		<tr>
			<td>email</td>
			<td><input type="textfield" name="email">
			<br/>
			@error('email')
				{{$message}}
			@enderror
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="textfield" name="Password">
			<br/>
			@error('Password')
				{{$message}}
			@enderror
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit">
			</br>
			{{session('error')}}
			</td>
		</tr>
	</table>
</form>

<style type="text/css">
	.error{color: red}
</style>