using UnityEngine;
using System.Collections;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class GameplayControllerMulti : MonoBehaviour 
{

	private Transform player;
	public int score = 0;
	public float maxTime = 100;
	public Text roundText;
	public float sceneTime = 0;
	private string roundOutput = "ROUNDS WON: ";

	public Text scoreText;
	private string scoreOutput = "SCORE: ";

	public Transform[] spawnPoints = new Transform[3];

	public GameObject ball;

	public GameObject gameOverText;
	public string gameOverScene;

	//public ShowScore ShowScore;
	void Awake()
	{
		PlayerPrefs.SetInt("score", 0);
		scoreText.text = scoreOutput + score;
		//player = GameObject.Find("Player").transform;
	}

	void Update () 
	{
		sceneTime += Time.deltaTime;
		if(maxTime - sceneTime <= 0)
			GameOver(gameOverScene);
    }

	//public void UpdateScore()
	//{
	//	score ++;
	//	scoreText.text = scoreOutput + score;
	//	ball.transform.position = new Vector3(25, 2, 0);
	//	ball.GetComponent<Rigidbody>().velocity = -ball.GetComponent<Rigidbody>().velocity;
	//	int i  = Random.Range(0, spawnPoints.Length);
	//	player.position = spawnPoints[i].position;
 //   }

    void OnCollisionEnter()
	{
        score = score + 10;
        PlayerPrefs.SetInt("score", score);
        scoreText.text = scoreOutput + score;
    }


 //   public void RespawnPlayer()
	//{
	//	playerLives --;
 //       roundText.text = roundOutput + playerLives;
	//	if(playerLives <= 0)
	//		GameOver(gameOverScene);
	//	else
	//	{
	//		int i  = Random.Range(0, spawnPoints.Length);
	//		player.position = spawnPoints[i].position;
	//		ball.transform.position = new Vector3(25, 2, 0);

	//	}
	//}

	void GameOver(string levelName)
	{
		PlayerPrefs.Save();
		//ShowScore.score = score;
        SceneManager.LoadScene(levelName);
		//Application.LoadLevel(levelName);
		//^- This is now obsolete, older versions of Unity use this. Keep it in mind if you work on older stuff!
	}
}
