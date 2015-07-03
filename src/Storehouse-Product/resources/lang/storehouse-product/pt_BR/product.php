<?php

/*
 * Favor ordenar pelo índice recursivamente.
 */

return [
   "general"     => [
       "actions"     => [
           "add"    => "Adicionar",
           "delete" => "Excluir",
           "edit"   => "Editar",
           "search" => "Pesquisar",
           "update" => "Atualizar"
       ],

       "back_to_system" => "Voltar ao Sistema",
   ],

   "navigation"  => [
       "brand"   => "Result Systems",
       "product" => [
           "product"  => "Produto",
           "register" => "Cadastrar",
           "search"   => "Pesquisar",
       ],
   ],

   "product" => [
       "create" => [
           "add"     => [
               "action"  => "Cadastrar",
               "heading" => "Cadastrar produto",
               "label"   => "Nome do produto"
           ],

           "empty"   => "Não existem produto cadastrados.",
           "heading" => "Adicionar produto"
       ],
       "edit" => [
           "add"     => [
               "action"  => "Edit",
               "heading" => "Edit product",
               "label"   => "Product name"
           ],

           "empty"   => "There are no registered product.",
           "heading" => "Edit product"
       ],
       "search" => [
           "add"     => [
               "action"  => "Pesquisar",
               "heading" => "Pesquisa de produtos",
               "label"   => "Nome do produto"
           ],

           "empty"   => "Não existem produto cadastrados.",
           "heading" => "Lista de produtos"
       ],
   ],
];
