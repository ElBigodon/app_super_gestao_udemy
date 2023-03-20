<h3>
    Fornecedor
</h3>

{{-- {{ 'Podemos usar essa forma para aplicar um código dentro do blade, como:' }} --}}
{{-- <?= 'Como dessa forma.' ?> --}}

{{-- Dessa forma é feito o comentário dentro do blade. --}}

{{-- Caso queira implementar um código php no blade, podemos fazer dessa forma: --}}
@php

    // Comentário de uma linha

    /*
        Comentário de várias linhas
        foo bar
    */

    // echo "Texto usando o 'echo' do php puro";
@endphp

{{-- Executando e visualizando os conteúdos da váriavel --}}
{{-- @dd($providers) --}}

{{-- Fazendo if, else if, else na syntax do blade --}}
@if (count($providers) > 0 && count($providers) < 10)
  há de 0 a 10 fornecedores cadastrados
@elseif (count($providers) > 9)
  há mais de 10 fornecedores cadastrados
@else
  não há fornecedores cadastrados
@endif

