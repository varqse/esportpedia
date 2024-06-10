@extends('layouts.user')

@section('contents')
<div class="container">
    <h2>Book Tickets for {{ $match->team1->TeamName }} vs {{ $match->team2->TeamName }}</h2>

    <form action="{{ route('matches.book.post', $match->MatchID) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="quantity">Number of Tickets</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required min="1" max="{{ $ticket->Quantity }}">
        </div>
        <p>Price per Ticket: ${{ $ticket->Price }}</p>
        <p>Total Price: <span id="totalPrice">${{ $ticket->Price }}</span></p>

        <button type="submit" class="btn btn-primary">Buy Tickets</button>
    </form>
</div>

<script>
    document.getElementById('quantity').addEventListener('input', function() {
        var quantity = this.value;
        var price = {{ $ticket->Price }};
        var totalPrice = quantity * price;
        document.getElementById('totalPrice').innerText = '$' + totalPrice;
    });
</script>
@endsection
