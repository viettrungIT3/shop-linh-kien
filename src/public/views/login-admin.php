<style>
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	:root {
		--form-content-width: 300px;
		--input-width: 200px;
		--input-height: 40px;
		--input-border-radius: 30px;
		--input-font-szie: 16px;
		--margin-medium: 20px;
		--input-color: #cccec1;
		--theme-color: #143a64;
		--bubble-size: 10px;
	}

	span {
		font-size: var(--input-font-szie);
	}

	.content {
		position: relative;
		width: 100vw;
		height: 100vh;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		background-image: linear-gradient(rgb(14, 44, 78), rgb(26, 136, 99));
	}

	.form-content {
		width: var(--form-content-width);
		padding: 50px;
		display: flex;
		flex-direction: column;
		align-items: center;
		border-radius: 10px;
		background-color: #fff;
		box-shadow: 0 0 30px rgb(6, 49, 49);
	}


	.form-item .move {
		padding: 0 5px;
		position: absolute;
		top: 50%;
		left: 10px;
		color: var(--input-color);
		pointer-events: none;
		background-color: #fff;
		transform: translateY(-55%);
		transition: 0.3s ease;
	}

	.form-content .form-item {
		position: relative;
		margin-bottom: var(--margin-medium);
	}

	.form-item .text {
		outline: none;
		width: var(--input-width);
		height: var(--input-height);
		border-radius: var(--input-border-radius);
		padding: 5px 15px;
		border: 1px solid var(--input-color);
		transition: 0.3s ease;
	}

	.form-item .text:focus {
		border: 1px solid var(--theme-color);
	}


	.form-item .text:focus+.move,
	.form-item .text:focus:valid+.move {
		top: 0px;
		left: 20px;
		font-size: 14px;
		color: var(--theme-color);
		background-color: #fff;
	}

	.form-item .text:valid+.move {
		top: 0px;
		left: 20px;
		font-size: 14px;
		background-color: #fff;
	}

	.form-content .button {
		position: relative;
		display: flex;
		justify-content: center;
		align-items: center;
		width: var(--input-width);
		height: var(--input-height);
		border-radius: var(--input-border-radius);
		margin-top: var(--margin-medium);
		color: #f8faec;
		font-size: var(--input-font-szie);
		background: linear-gradient(rgb(28, 122, 116), rgb(26, 136, 99));
		box-shadow: 0px 3px 20px rgba(26, 136, 99, 0.5),
			0px 2px 3px rgba(170, 245, 199, 0.76) inset;
		cursor: pointer;
		overflow: hidden;
		transition: .3s;
	}

	.button-ball {
		z-index: 3;
		position: absolute;
		top: 40px;
		left: 50%;
		transform: translateX(-50%);
		width: 300px;
		height: 300px;
		background-color: rgb(59, 189, 145);
		border-radius: 50%;
		transition: 1s ease;
	}

	.button:hover .button-ball {
		left: 50%;
		transform: translate(-50%, -50%);
	}

	.button:active {
		transform: translate(2px, 2px);
	}

	.bubble {
		z-index: 999;
		position: absolute;
		width: var(--bubble-size);
		height: var(--bubble-size);
		border-radius: 50%;
		border: none;
		box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
		transition: 1s ease-in-out;
	}
</style>

<div class="content">
	<h2>Login admin</h2>
	<form action="#" class="form-content">
		<div class="form-item">
			<input type="text" class="text" name="username" required="">
			<label class="move" for="username">Email</label>
		</div>
		<div class="form-item">
			<input type="password" class="text" name="password" required="">
			<label class="move" for="password">password</label>
		</div>
		<div class="button">
			<span style="z-index: 99;">submit</span>
			<div class="button-ball"></div>
		</div>
	</form>
</div>