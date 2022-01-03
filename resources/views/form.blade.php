<h1>My Form</h1>
<form method="post" action="formSubmit" enctype="multipart/form-data">
	{{@csrf_field()}}
	<table>
		<tr>
			<td>name</td>
			<td><input type="textfield" name="name">
			<br/>
			@error('name')
				{{$message}}
			@enderror
			</td>
		</tr>
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
			<td>File</td>
			<td><input type="file" name="document">
			<br/>
			@error('document')
				{{$message}}
			@enderror
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit"></td>
		</tr>
	</table>
</form>

<style type="text/css">
	.error{color: red}
</style>