<x-layout title="Log In">
	<x-form.standard action="/login">
		<h1 class="text-center mb-4 font-bold text-xl">Log In</h1>

		<x-form.tab name="email">
			<x-form.input name="email" type="email"/>
		</x-form.tab>

		<x-form.tab name="password">
			<x-form.input name="password" type="password" old=false />
		</x-form.tab>

		<x-buttons.submit>Log In</x-buttons.submit>
	</x-form.standard>
</x-layout>