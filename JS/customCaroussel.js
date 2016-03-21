$(document).ready(function() {
	if($("#owl-index")[0])
	{
		console.log("owl-index");
		var time = 7; // time in seconds

		var $progressBar,
			$bar, 
			$elem, 
			isPause, 
			tick,
			percentTime;

		//Init the carousel
		$("#owl-index").owlCarousel({
			slideSpeed : 500,
			paginationSpeed : 500,
			singleItem : true,
			afterInit : progressBar,
			afterMove : moved,
			startDragging : pauseOnDragging
		});

		//Init progressBar where elem is $("#owl-index")
		function progressBar(elem){
			$elem = elem;
			//build progress bar elements
			buildProgressBar();
			//start counting
			start();
		}

		//create div#progressBar and div#bar then prepend to $("#owl-index")
		function buildProgressBar(){
			$progressBar = $("<div>",{
				id:"progressBar"
			});
			$bar = $("<div>",{
				id:"bar"
			});
			$progressBar.append($bar).prependTo($elem);
		}

		function start() {
		//reset timer
			percentTime = 0;
			isPause = false;
			//run interval every 0.01 second
			tick = setInterval(interval, 10);
		};

		function interval() {
			if(isPause === false){
				percentTime += 1 / time;
				$bar.css({
					width: percentTime+"%"
				});
				//if percentTime is equal or greater than 100
				if(percentTime >= 100){
				//slide to next item 
					$elem.trigger('owl.next')
				}
			}
		}
		//pause while dragging 
		function pauseOnDragging(){
			isPause = true;
		}

		//moved callback
		function moved(){
			//clear interval
			clearTimeout(tick);
			//start again
			start();
		}
		//uncomment this to make pause on mouseover 
		$elem.on('mouseover',function(){
			isPause = true;
		})
		$elem.on('mouseout',function(){
			isPause = false;
		})
	}
	if($("#owl-projet")[0])
	{
		console.log("#owl-projet");
		$("#owl-projet").owlCarousel({
			navigation : false, // Show next and prev buttons
			slideSpeed : 300,
			paginationSpeed : 400,
			singleItem:true
		});
			
	}
});