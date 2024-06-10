@extends('layouts.user')

@section('contents')



<body>
    <h1>Buy Ticket</h1>
    <form action="<?php echo route('buy.ticket', ['ticket_id' => $ticketId]); ?>" method="POST">
        <?php echo csrf_field(); ?> <!-- CSRF Protection -->
        <input type="hidden" name="ticket_id" value="<?php echo $ticketId; ?>">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="1" min="1">
        <button type="submit">Buy Now</button>
    </form>
    <!-- Tambahkan elemen HTML lainnya sesuai kebutuhan -->
</body>



@endsection