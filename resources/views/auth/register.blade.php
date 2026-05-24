<x-layout>

<form action="/register" method="POST">
@csrf

  <fieldset class="fieldset mx-auto bg-base-200 border-base-300 rounded-box w-xs border p-4">
  <legend class="fieldset-legend">Registro</legend>

  <label class="label" for="name">Nombre</label>
  <input type="input" name="name" class="input" placeholder="Tu nombre" required/>
 
  <label class="label" for="email">Email</label>
  <input type="email" name="email" class="input" placeholder="Email" required/>

  <label class="label">Password</label>
  <input type="password" name="password" class="input" placeholder="Password" required/>

  <button class="btn btn-neutral mt-4">Registrarse</button>
  </fieldset>

</form>

</x-layout>