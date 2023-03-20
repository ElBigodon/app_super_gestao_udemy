<h3>
  Fornecedor
</h3>

{{ 'Podemos usar essa forma para aplicar um código dentro do blade, como:' }}
<?= 'Como dessa forma.' ?>

{{-- Dessa forma é feito o comentário dentro do blade. --}}

{{-- Caso queira implementar um código php no blade, podemos fazer dessa forma: --}}
@php

  // Comentário de uma linha

  /*
    Comentário de várias linhas
    foo bar
  */

  echo "Texto usando o 'echo' do php puro"

@endphp
