# DESAFIO TÉCNICO

## Anoreg (o cliente)
- É uma associação criada para representar os tabeliães de cartórios em qualquer instância ou Tribunal.
- Representa os interesses em comum da classe.
- Também trabalham com cursos e eventos.
- São financiados por contribuições dos cartórios de todo o Brasil.
- O Conselho Nacional de Justiça (CNJ) regulamenta e fiscaliza o trabalho dos cartórios.
- Como eles possuem os cartórios cadastrados, enviam para a Anoreg.

## O problema

-	A Anoreg possui uma base dos cartórios associados em planilha Excel.
-	A planilha é atualizada mensalmente com base em um arquivo XML enviado pelo CNJ. A funcionária da Anoreg abre o arquivo XML em um navegador e atualiza a planilha copiando e colando os dados. 
-	Os campos telefone e e-mail não são informados pelo CNJ, sendo atualizados manualmente na planilha.
-	Existem cartórios que não são enviados pelo CNJ sendo inseridos manualmente na planilha.
-	A Anoreg, periodicamente, envia comunicados para seus associados endereçados aos e-mails cadastrados na planilha. 
-	A Anoreg conta com uma funcionária dedicada exclusivamente para realizar toda essa operação de atualização e envio dos e-mails. 
-	Visando reduzir custos, o presidente da Anoreg ordenou que a funcionária seja demitida, e a operação deverá ser realizada pela secretária que, por sua vez, tem diversas outras ações diárias a fazer e não conseguirá realizar o trabalho da forma como é feito. 


## Restrições técnicas

O sistema deve ser desenvolvido com base nas tecnologias
 
- Apache
- PHP
- MySQL
- HTML/CSS
- JavaScript

## Frameworks permitidos no desafio:
- JavaScript: jQuery
- CSS: Bootstrap
- Framework PHP próprio

`Pode ser utilizado o Composer`

## Arquivos necessários
 * [Planilha excel](https://github.com/p21sistemas/vikings/blob/master/Cart%C3%B3rios.xlsx) - Planilha atualizada com a lista de cartórios
 * [Arquivo XML](https://github.com/p21sistemas/vikings/blob/master/Cart%C3%B3rios-CNJ.xml) - Arquivo XML para importação

