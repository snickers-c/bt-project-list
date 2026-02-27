<div>
    <form method="POST" action="/profile/result">
        @csrf

        <input type="text" name="name" placeholder="Meno">
        <input type="email" name="email" placeholder="E-mail">
        <input type="number" name="age" placeholder="Vek">
        
        <select name="role">
            @foreach ($roles as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
            
            @foreach ($skills as $skill) 
            <input type="checkbox" name="skills[]" value="{{ $skill }}">
            {{ $skill }}
            @endforeach
        </select>
        
        <button type="submit">Odoslať</button>
    </form>
</div>
