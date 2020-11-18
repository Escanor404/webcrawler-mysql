<?php 

//Função para pegar os dados
//Do site: "https://br.leagueoflegends.com/pt-br/champions/";
function crawler(){
    //Configuração de proxy SENAI
    $proxy = '10.1.21.254:3128';

    //Array de configuração
    $arrayConfig = array(
        'http' => array(
            'proxy' => $proxy,
            'request_fulluri' => true
        ),
        'https' => array(
            'proxy' => $proxy,
            'request_fulluri' => true
        )
    );
    $context = stream_context_create($arrayConfig);
    //Fim do array de configuração. Aceita tanto o http e o https.

    $url = "https://br.leagueoflegends.com/pt-br/champions/";
    $html = file_get_contents($url, false, $context);

    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $arrayCampeao = [];

    //Trasnforma o HTML em objeto
    $dom->loadHTML($html);
    libxml_clear_errors();
    //Declarado variável a para percorrer depois
    $tagA = $dom->getElementsByTagName('a');
    //Percorre as tags a do código da página
    foreach ($tagA as $a) {
        //Declarado variável a para percorrer depois
        $tagsSpan = $a->getElementsByTagName("span");
        //Percorre as tagas span
        foreach($tagsSpan as $span){
            $class = $span->getAttribute('class');
            if($class == "style__ImageContainer-sc-12h96bu-1 klVtHm"){
                $tagsImg = $span->getElementsByTagName('img');
                foreach($tagsImg as $img){
                    $imgSrc = $img->getAttribute("src");
                    $campeao['imagem'] = $imgSrc;
                }
            //função para pegar os nomes dos champs
            } else if($class == "style__Name-sc-12h96bu-2 fbvLsk"){
                $campeao['nome'] = $span->nodeValue;
                $arrayCampeao[] = $campeao;
            }
        }
    }
    //retorna o array campeoa
    return $arrayCampeao;
}