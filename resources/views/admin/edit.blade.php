<form
action="{{ route('bolsas.update', $bolsa->id) }}"
method="POST"
enctype="multipart/form-data"
>

    @csrf
    @method('PUT')

    <input
    type="text"
    name="nombre"
    value="{{ $bolsa->nombre }}"
    >

    <input
    type="number"
    name="precio"
    value="{{ $bolsa->precio }}"
    >

    <textarea
    name="descripcion"
    >{{ $bolsa->descripcion }}</textarea>

    <input type="file" name="imagen">

    <button type="submit">
        Actualizar
    </button>

</form>