
// function getData(cb) {
// 	const clientId = 'be00453jnj8hxjnyratke1dcm1invd';
// 	const limit = 20;

// 	$ajax({
// 		url: 'https://api.twitch.tv/kraken/streams/?client_id=' + clientId + '?&game=League%20of%20Leagues' ,true;
// 		success: (response) => {
// 			console.log(response);
// 			cb(null,response);
// 		}
// 	}
// }

// getData((err, data) => {
// 	const {streams} = data;
// 	const $row = $('.row');
// 	for(let stream of streams) {
// 		$row.append(getColumn(stream));
// 	}
// })

// function getColumn(data) {
// 	return  `
// 		<div class="col">
// 			<div class="preview">
// 				<img src="${data.preview.medium}"/>
// 			</div>
// 			<div class="bottom">
// 				<div class="intro">
// 					<div class="logo">
// 						<img src="${data.channel.logo}"/>
// 					</div>
// 					<div class="desc">
// 						<div class="title">
// 						${data.channel.status}
// 						</div>
// 						<div class="name">
// 						${data.channel.display_name}
// 						</div>
// 					</div>
// 				</div>
// 			</div>
// 		</div>`;

// }

function getData(cb) {
	const clientId = 'be00453jnj8hxjnyratke1dcm1invd';
	const limit = 20;

	$.ajax({
		url: 'https://api.twitch.tv/kraken/streams/?game=Overwatch' ,
		success: (response) => {
			console.log(response);
			cb(null,response);
		},
    headers: {
      "Client-ID":clientId,
      "Accept":'application/vnd.twitchtv.v5+json'
    }
	})
}

getData((err, data) => {
	const {streams} = data;
	const $row = $('.row');
	for(let stream of streams) {
		$row.append(getColumn(stream));
	}
})

function getColumn(data) {
	return  `
		<div class="col">
			<div class="preview">
				<img src="${data.preview.medium}"/>
			</div>
			<div class="bottom">
				<div class="intro">
					<div class="logo">
						<img src="${data.channel.logo}"/>
					</div>
					<div class="desc">
						<div class="title">
						${data.channel.status}
						</div>
						<div class="name">
						${data.channel.display_name}
						</div>
					</div>
				</div>
			</div>
		</div>`;

}

