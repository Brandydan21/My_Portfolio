using UnityEngine;
using System.Collections;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class GameplayController : MonoBehaviour 
{
	public int maxLives = 3;
	private int playerLives;
	private Transform player;
	private int score = 0;
	public float maxTime = 100;
	public Text lifeText;
	public float sceneTime = 0;
	private string lifeOutput = "Lives: ";

	public Text scoreText;
	private string scoreOutput = "Score: ";

	public Text timerText;
	private string timeOutput = "Timer: ";

	public Transform[] spawnPoints = new Transform[3];

	public GameObject ball;

	public GameObject gameOverText;
	public string gameOverScene;
	void Awake()
	{
		PlayerPrefs.SetInt("score", 0);
		playerLives = maxLives;
		lifeText.text = lifeOutput + playerLives;
		scoreText.text = scoreOutput + score;
		lifeText.text = lifeOutput + playerLives;
		player = GameObject.Find ("PhysicsPlayer").transform;
	}

	void Update () 
	{
		sceneTime += Time.deltaTime;
		UpdateTimer();
		if(maxTime - sceneTime <= 0)
			GameOver(gameOverScene);
		if(playerLives <= 0)
			GameOver(gameOverScene);
	}

	public void UpdateScore()
	{
		score ++;
		scoreText.text = scoreOutput + score;
		ball.transform.position = new Vector3(25, 2, 0);
		ball.GetComponent<Rigidbody>().velocity = -ball.GetComponent<Rigidbody>().velocity;
		int i  = Random.Range(0, spawnPoints.Length);
		player.position = spawnPoints[i].position;


	}
	void UpdateTimer()
	{
		timerText.text = timeOutput + (Mathf.RoundToInt(maxTime - sceneTime)).ToString();
	}
	public void RespawnPlayer()
	{
		playerLives --;
		lifeText.text = lifeOutput + playerLives;
		if(playerLives <= 0)
			GameOver(gameOverScene);
		else
		{
			int i  = Random.Range(0, spawnPoints.Length);
			player.position = spawnPoints[i].position;
			ball.transform.position = new Vector3(25, 2, 0);

		}
	}

	void GameOver(string levelName)
	{
		PlayerPrefs.SetInt("score", score);
		SceneManager.LoadScene(levelName);
		//Application.LoadLevel(levelName);
		//^- This is now obsolete, older versions of Unity use this. Keep it in mind if you work on older stuff!
	}
}
