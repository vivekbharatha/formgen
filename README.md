A simple library to generate forms with bootstrap css.</br>
Will update soon how use this :)

A Basic template for xml file to get the required form is below.
Please do follow the rules/syntax as below to get best results!

'''
<?xml version="1.0" encoding="UTF-8"?>
<form>
		<email><!-- Input Tag Example -->
			<name>email_address</name>
			<placeholder>Email</placeholder>
		</email>

		<password>
			<name>password</name>
			<placeholder>Password</placeholder>
		</password>

		<select> <!-- Select tag example -->
			<name>category</name>
			<options>
				<SelectCategory><value>0</value></SelectCategory>
				<Option1><value>option1</value></Option1>
				<Option2><value>option2</value></Option2>
				<Option3><value>option3</value></Option3>
				<Option4><value>option4</value></Option4>
			</options>
		</select>

		<textarea> <!-- Textarea Example -->
			<name>description</name>
			<placeholder>Description</placeholder>
		</textarea>

		<radio> <!-- Radio Example -->
			<name>gender</name>
			<value>male</value>
			<text>Male</text>
		</radio>

		<radio>
			<name>gender</name>
			<value>female</value>
			<text>Female</text>
		</radio>

		<checkbox> <!-- Checkbox Example -->
			<name>pen</name>
			<value>pen</value>
			<text>Pen</text>
		</checkbox>

		<checkbox>
			<name>pencil</name>
			<value>pencil</value>
			<text>Pencil</text>
		</checkbox>

		<submit> <!-- Input Type submit Example -->
			<name>submsdait</name>
			<value>Login</value>
			<class>btn btn-primary</class>
		</submit>
</form>
'''
