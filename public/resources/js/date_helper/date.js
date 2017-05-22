function somaDate(days) {
	var previsao = new Date();
	var dataAtual = new Date();
	
	previsao.setDate(dataAtual.getDate() + days);  		
    return previsao.getDate()  +"/" + (previsao.getMonth() + 1)+ "/" + previsao.getFullYear();

};

function brToday() {
	var dataAtual = new Date();
	
	return dataAtual.getDate()  +"/" + (dataAtual.getMonth() + 1)+ "/" + dataAtual.getFullYear();
};