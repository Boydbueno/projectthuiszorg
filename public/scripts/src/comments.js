/** @jsx React.DOM */

//Data

var jobId = $("#comments").attr("rel");

//React Components

var CommentList = React.createClass({
	render:function(){

		//Create comments from commentBox's data
		var commentNodes = this.props.data.map(function(comment){
			return <Comment author={comment.user.user_info.firstName+' '+comment.user.user_info.lastName}>{comment.text}</Comment>;
		});

		//Return the comment list
		return(
			<div className="commentList">
				{commentNodes}
			</div>
		);
	}
});

var CommentForm = React.createClass({
	handleSubmit: function(){
		//Get the input
		var text = this.refs.text.getDOMNode().value.trim();

		//Check if the input isset
		if(!text){
			return false;
		}

		//Clear the field again
		this.refs.text.getDOMNode().value = '';

		//Make sure the page doesn't reload, aka preventDefault
		return false;
	},
	render:function(){
		return(
			<form className="commentForm" onSubmit={this.handleSubmit}>
				<input type="text" ref="text" placeholder="Wat wilt u vragen..." />
				<input type="submit" value="Post" />
			</form>
		);
	}
});

var CommentBox = React.createClass({
	loadCommentsWithAjax: function(){
		$.ajax({
			url: '/api/jobs/'+jobId+'/comments',
			dataType: 'json',
			success: function(data) {
				//Replace the old array of data with new data
				//This forces the component to re-render itself
				this.setState({data: data});
			}.bind(this),
			error: function(xhr, status, err) {
				console.error("comments.json", status, err.toString());
			}.bind(this)
		});
	},
	getInitialState: function(){
		return {data: []};
	},
	//Executed before the component is rendered
	componentWillMount: function(){
		//Load all the comments from the server
		this.loadCommentsWithAjax();
		//Set an interval to check for new comments
		setInterval(this.loadCommentsWithAjax, this.props.pollInterval);
	},
	//Render the commentBox and pass the data to the commentList
	render:function(){
		return(
			<div className="commentBox">
				<h1>Comments</h1>
				<CommentList data={this.state.data} /> 
				<CommentForm />
			</div>
		);
	} 
});

var Comment = React.createClass({
	render:function(){
		return(
			<div className="comment">
				<span className="bold">{this.props.author}</span>
				<p>{this.props.children}</p>
			</div>
		)
	}
});

React.renderComponent(
	<CommentBox pollInterval={2000} />,
	document.getElementById('comments')
)
