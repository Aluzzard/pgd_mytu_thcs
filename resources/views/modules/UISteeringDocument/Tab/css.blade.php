<style>
	.UISteeringDocument.Tab {
		margin: 15px 0;
	}
	.UISteeringDocument.Tab .heading{
	    font-size: 15px;
	    font-weight: bold;
	    line-height: 27px;
	}
	.UISteeringDocument.Tab .heading span {
		background: var(--color-background);
	    color: white;
	    padding: 5px 10px;
	}
	.UISteeringDocument.Tab .content {
		padding: 0 10px 0 0;
		border: 1px solid var(--color-background);
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
	.UISteeringDocument.Tab .content .datetime {
		color: var(--color-font);
	}
	.UISteeringDocument.Tab a {
		text-decoration: none;
		color: #333;
	}
	.UISteeringDocument.Tab i {
		margin-right: 3px;
		color: var(--color-font);
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