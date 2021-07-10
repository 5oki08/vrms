





					<script type="text/javascript">
	
					function getUser(str) {
						if ( str == "" ) {
						document.getElementById('carBrand').innerHTML = "" ;
						return;
					} else {
						var userEnter = new XMLHttpRequest() ;
						userEnter.onreadystatechange = function() {
							if ( this.readyState == 4 && this.status == 200 ) {
								document.getElementById('carBrand').innerHTML = this.responseText ;
							} 
						} ;
						userEnter.open( "GET","fourwheelerbookingrecordsAdmin.php?q="+str,true ) ;
						userEnter.send() ;
					}


				</script> 
				 
				<form> 
					<select name="carBrand" onchange="getUser(this.value)">
						<option value=""></option>
						<option value="JeepWrangler">wrangler</option>
						<option value="Grand Cherokee">grandCherokee</option>
						<option value="evo6">evo6</option>
						<option value="astonMartinVantage">vantage</option>
						<option value="astonMartinDB5">DB5</option>
						<option value="astonMartinDBx">DBx</option>
					</select>
				</form>
				
				<div id="carBrand"><b>info will be listed here...</b></div> 