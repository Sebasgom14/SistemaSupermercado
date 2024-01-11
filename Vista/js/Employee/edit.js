function showContent(contentId) {
    // Oculta todos los contenidos
    document.getElementById('edit').style.display = 'none';
    document.getElementById('editpassword').style.display = 'none';

    // Muestra el contenido específico según la opción seleccionada
    document.getElementById(contentId).style.display = 'block';
}

$('#editItem').on('click', function() {
    $(this).addClass('active');
    $("#passItem").removeClass('active');
});

$('#passItem').on('click', function() {
    $(this).addClass('active');
    $("#editItem").removeClass('active');
});



