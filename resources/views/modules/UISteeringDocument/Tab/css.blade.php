<style>
	.UISteeringDocument.Tab {
		margin: 15px 0;
	}
	.UISteeringDocument.Tab .heading{
		background: url(assets/guests/default/modules/UIVerticalMenu/image/header.png) no-repeat, linear-gradient(45deg, #409eff 0%, rgb(2, 55, 119) 100%);
		background-size: auto 30px;
		height: 30px;
		padding-left: 100px;
	    color: white;
	    font-size: 15px;
	    font-weight: bold;
	    line-height: 27px;
	}
	.UISteeringDocument.Tab .content {
		padding: 0 10px 0 0;
		border: 1px solid #2196f3;
		height: 300px;
		overflow: auto;
	}
	.UISteeringDocument.Tab li {
		list-style: none;
		padding: 10px 0;
		line-height: 1.75;
		border-bottom: 1px solid #dcdcdd;
	}
	.UISteeringDocument.Tab .title {
		-webkit-line-clamp: 2;
	    -webkit-box-orient: vertical;
	    overflow: hidden;
	    display: -webkit-box;
	}
	.UISteeringDocument.Tab li:last-child {
		border: none;
	}
	.UISteeringDocument.Tab .content p {
		margin: 0;
	}
	.UISteeringDocument.Tab a {
		text-decoration: none;
		color: #333;
	}
	.UISteeringDocument.Tab i {
		margin-right: 3px;
		color: var(--bs-link-color);
	}

	::-webkit-scrollbar {
		width: 0;
	}
	.UISteeringDocument.Tab .content::-webkit-scrollbar {
		width: 2px;
	}
	/* Track */
	.UISteeringDocument.Tab .content::-webkit-scrollbar-track {
/*		box-shadow: inset 0 0 5px grey; */
  		border-radius: 10px;
  		background: white;
	}
	/* Handle */
	.UISteeringDocument.Tab .content::-webkit-scrollbar-thumb {
		background: #0073cf; 
	}
	/* Handle on hover */
	.UISteeringDocument.Tab .content::-webkit-scrollbar-thumb:hover {
		background: #555; 
	}
</style>