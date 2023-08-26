using System.Collections;
using System.Collections.Generic;
using UnityEngine.UI;
using UnityEngine;

public class ShowScore : MonoBehaviour
{
    public Text scoreText;
    public int score;

    void Awake()
    {
        score = PlayerPrefs.GetInt("score");
        Cursor.lockState = CursorLockMode.Confined;
        Cursor.visible = true; // make the cursor useable again.
        scoreText.text = "Score: " + score;
    }

}
