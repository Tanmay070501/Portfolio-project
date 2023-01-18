@extends('layouts.app')
@section('content')
<form action={{ route('payit') }} method="POST">
    @csrf
    <script
      src="https://checkout.stripe.com/checkout.js"
      class="stripe-button"
      data-key="pk_test_51MJFxzSFD0SDBDemzuNwwxC2mgVunKAFLUPkNnccd8JKliPraQHvpajKrJbxNJcPV9L8vLzcWeyTYga1PEddy07A00wY5W55Bq"
      data-name="Gold Tier"
      data-description="Monthly subscription"
      data-amount="200"
      data-currency="inr"
      data-email={{ Auth::user()->email }}
      data-label="Subscribe">
    </script>
  </form>
@endsection