<x-layout title="Register">
	<x-form.standard action="/register">
		<h1 class="text-center mb-4 font-bold text-xl">Register</h1>

		<x-form.tab name="name">
			<x-form.input name="name"/>
		</x-form.tab>

		<x-form.tab name="username">
			<x-form.input name="username"/>
		</x-form.tab>

		<x-form.tab name="email">
			<x-form.input name="email" type="email"/>
		</x-form.tab>

		<x-form.tab name="password">
			<x-form.input name="password" type="password" old=false />
		</x-form.tab>

		<x-buttons.submit>Submit</x-buttons.submit>
	</x-form.standard>
</x-layout>