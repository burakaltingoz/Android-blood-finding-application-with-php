package com.example.isatan.burbo;


import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONObject;

import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;

import static com.example.isatan.burbo.R.id.Spinner01;


public class KayitActivity extends AppCompatActivity implements View.OnClickListener{
    private String array_spinner[];
    public static final String REGISTER_URL = "http://burakaltingoz.xyz/kayitol.php"; //değişecek

    public static final String KEY_USERNAME = "kullaniciadi";
    public static final String KEY_PASSWORD = "sifre";
    public static final String KEY_EMAIL = "email";
    public static final String KEY_KAN = "kan";
    public static final String KEY_TEL = "tel";

    private EditText editTextUsername;
    private EditText editTextEmail;
    private EditText editTextPassword;
    //private EditText editTextBlood;
    private EditText editTextTel;

    private Button buttonRegister;

    String ad="";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(com.example.isatan.burbo.R.layout.activity_kayit);

        editTextUsername = (EditText) findViewById(com.example.isatan.burbo.R.id.edit_ad);
        editTextPassword = (EditText) findViewById(com.example.isatan.burbo.R.id.edit_sifre);
        editTextEmail = (EditText) findViewById(com.example.isatan.burbo.R.id.edit_email);
        //editTextBlood = (EditText) findViewById(R.id.edit_kan);
        editTextTel = (EditText) findViewById(com.example.isatan.burbo.R.id.edit_tel);
        buttonRegister = (Button) findViewById(com.example.isatan.burbo.R.id.buttonkayit);

        array_spinner=new String[9];
        array_spinner[0]="Kan Grubu Seçiniz";
        array_spinner[1]="Arh-";
        array_spinner[2]="Arh+";
        array_spinner[3]="Brh-";
        array_spinner[4]="Brh+";
        array_spinner[5]="0rh-";
        array_spinner[6]="0rh+";
        array_spinner[7]="ABrh-";
        array_spinner[8]="ABrh+";
        Spinner s = (Spinner) findViewById(Spinner01);
        ArrayAdapter adapter = new ArrayAdapter(this, android.R.layout.simple_spinner_item, array_spinner);
        s.setAdapter(adapter);
        buttonRegister.setOnClickListener(this);

    }

    private void registerUser() {


        final String username = editTextUsername.getText().toString().trim();
        final String password = editTextPassword.getText().toString().trim();
        final String email = editTextEmail.getText().toString().trim();
       // final String kan = editTextBlood.getText().toString().trim();

        Spinner spinner = (Spinner)findViewById(com.example.isatan.burbo.R.id.Spinner01);
        final String kansp = spinner.getSelectedItem().toString().trim();
        final String tel = editTextTel.getText().toString().trim();
        ad=username;

        if(username==null || username.isEmpty() || password==null || password.isEmpty() || email==null || email.isEmpty()|| kansp==null || kansp.isEmpty() || kansp=="Kan Grubu Seçiniz" || tel==null || tel.isEmpty())
        {
            Toast.makeText(KayitActivity.this, "Lütfen Tüm Alanları Doldurunuz!", Toast.LENGTH_LONG).show();

        }
        else
        {

            StringRequest stringRequest = new StringRequest(Request.Method.POST, REGISTER_URL,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {

                            try {
                                JSONObject object=new JSONObject(response);
                                Iterator<String> iter = object.keys();
                                while (iter.hasNext()) {
                                    String key = iter.next();

                                    if(key.equals("olumlu"))
                                    {

                                        String olumlu=object.getString("olumlu");
                                        Toast.makeText(KayitActivity.this,olumlu, Toast.LENGTH_LONG).show();
                                        finish();
                                    }
                                    else if(key.equals("olumsuz"))
                                    {
                                        String olumsuz=object.getString("olumsuz");
                                        Toast.makeText(KayitActivity.this,olumsuz, Toast.LENGTH_LONG).show();
                                    }
                                }
                            } catch (Throwable t) {
                                Log.e("My App", "Could not parse malformed JSON: \"" + response + "\"");
                                Intent intent = new Intent(KayitActivity.this, com.example.isatan.burbo.MainActivity.class);
                                startActivity(intent);
                            }
                        }
                    },
                    new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
                            Toast.makeText(KayitActivity.this, error.toString(), Toast.LENGTH_LONG).show();
                        }
                    }) {
                @Override
                protected Map<String, String> getParams() {
                    Map<String, String> params = new HashMap<String, String>();
                    params.put(KEY_USERNAME, username);
                    params.put(KEY_PASSWORD, password);
                    params.put(KEY_EMAIL, email);
                    params.put(KEY_KAN, kansp);
                    params.put(KEY_TEL,"+9"+tel);
                    return params;
                }

            };

            RequestQueue requestQueue = Volley.newRequestQueue(this);
            requestQueue.add(stringRequest);
    }
    }

    @Override
    public void onClick (View v){
        if(v == buttonRegister){
            registerUser();
        }}
}
