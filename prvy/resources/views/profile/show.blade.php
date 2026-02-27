<div>
    <p>Meno: {{ $data['name'] }}</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>Vek: {{ $data['age'] }}</p>
    <p>Rola: {{ $additionalData['roleLabel'] }}</p>

    <p>
        Plnoletosť:
        @if ($additionalData['isAdult'])
            plnoletý
        @else 
            neplnoletý
        @endif
    </p>

    <p>
        Zručnosti ({{ $additionalData['skillsCount'] }}):
    </p>

    @if (count($data['skills']) === 0)
        <p>žiadne zručnosti</p>
    @else 
        <ul>
            @foreach ($data['skills'] as $skill)
                <li>{{ $skill }}</li>
            @endforeach
        </ul>
    @endif
</div>
