<x-layout>

<form action="/login" method="POST">
@csrf

  <fieldset class="fieldset mx-auto bg-base-200 border-base-300 rounded-box w-xs border p-4">
  <legend class="fieldset-legend">Iniciar sesión</legend>

  <label class="label" for="email">Email</label>
  <input type="email" name="email" class="input" placeholder="Email" required/>
  <x-error name="email"/>

  <label class="label">Password</label>
  <input type="password" name="password" class="input" placeholder="Password" required/>
  <x-error name="password"/>

  <button class="btn btn-neutral mt-4">Iniciar sesión</button>
  </fieldset>

</form>

</x-layout>