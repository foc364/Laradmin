@extends('beautymail::templates.minty')

@section('content')

	@include('beautymail::templates.minty.contentStart')
		<tr>
			<td class="title">
				Segue os dados do paciente para consulta.
			</td>
		</tr>
		<tr>
			<td width="100%" height="10"></td>
		</tr>
		<tr>
			<td class="paragraph">
				Nome - {{ $name }}
			</td>
		</tr>
		<tr>
			<td class="paragraph">
				Telefone Fixo - {{ $phone }}
			</td>
		</tr>
		<tr>
			<td class="paragraph">
				Celular - {{ $cellphone }}
			</td>
		</tr>
		<tr>
			<td class="paragraph">
				WhatsApp - {{ $whatsapp }}
			</td>
		</tr>
		<tr>
			<td class="paragraph">
				E-mail - {{ $email }}
			</td>
		</tr>
		<tr>
			<td class="paragraph">
				Consultório - {{ $place }}
			</td>
		</tr>
		<tr>
			<td class="paragraph">
				Convênio - {{ $health_insurance }}
			</td>
		</tr>
		
	@include('beautymail::templates.minty.contentEnd')

@stop