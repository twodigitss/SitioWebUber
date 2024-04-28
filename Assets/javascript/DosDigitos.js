function limitInput(event) {
    const input = event.target;
    // Verifica si la longitud del valor actual es mayor que 2
    if (input.value.length > 2) {
        // Si es mayor que 2, corta el valor para que tenga solo los primeros dos caracteres
        input.value = input.value.slice(0, 2);
    }
}
