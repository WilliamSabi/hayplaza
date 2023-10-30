<!DOCTYPE html>
<html lang="en">
<body style="font-family: Arial, sans-serif; color: #fff;">

<section style="color: black;">
    <p>¡Enhorabuena! 🎉<b>{{$asistente->nombre}}</b>, Te has registrado con éxito al viaje más emocionante de este año: {{ $evento->nombre }}. ¡Prepárate para la aventura!</p>

    <p>Marca tu calendario y no lo olvides:</p>

    <p>📅 Fecha: {{ $evento->inicio }} hasta {{ $evento->final }}</p>

    <p>📍 Lugar: {{ $evento->lugar }}</p>

    <p>Solo una cosita más: lleva tu cédula el día del evento, la necesitaremos para confirmar tu registro. ¡Prometemos que será rápido!</p>

    <p>¡Nos vemos pronto y gracias por ser parte de esto!</p>

    <p>Quedamos a su disposición para cualquier consulta adicional.</p>
    
    <p>Atentamente,</p>

    <p>HayPlaza - Ticket Virtual</p>

    <p>Fecha del registro: <?php echo date('Y-m-d H:i:s'); ?></p>

</section>



</body>
</html>