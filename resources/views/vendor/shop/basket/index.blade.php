@extends('shop::base')

@section('aimeos_header')
    <?= $aiheader['basket/standard'] ?>
    <?= $aiheader['basket/related'] ?>
	<?= $aiheader['locale/select'] ?>	
@stop

@section('aimeos_head')
	<?= $aibody['locale/select'] ?>
@stop

@section('aimeos_body')
    <?= $aibody['basket/standard'] ?>
    <?= $aibody['basket/related'] ?>
@stop
