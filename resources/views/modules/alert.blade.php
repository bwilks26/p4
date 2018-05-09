<!-- show the correct alert upon first visiting page or submitting form -->
@if(($field == 'result') && (count($errors) == 0))
    <div class='alert alert-success' role='alert'>
        <p>You split <em>${{ $billAmount }}</em> into <em> {{ $splitTerm }} </em> ways with
            <em> {{ $tipAmount }}% tip</em>.</p>
        <p>Bill split: Everyone owes <em>${{$result or 0}} each</em></p>
    </div>
@else
    <div class='alert alert-info' role='alert'>
        <p>Welcome to Bill Splitter! Please enter the appropriate information into the form above.</p>
    </div>
@endif