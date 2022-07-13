#include <iostream>
using namespace std;

void obtineCheieMatrice(string cheie, int cheieMatrice[][3]) {
	int k = 0;
	for (int i = 0; i < 3; i++) {
		for (int j = 0; j < 3; j++) {
			cheieMatrice[i][j] = (cheie[k]) % 65;
			k++;
		}
	}
}

void criptare (int matriceCifru[][1], int cheieMatrice[][3], int vectorMesaj[][1]) {
	for (int i = 0; i < 3; i++) {
		for (int j = 0; i < 3; j++) {
			matriceCifru[i][j] = 0;

			for (int x = 0; x < 3; x++) {
				matriceCifru[i][j] += cheieMatrice[i][x] * vectorMesaj[x][j];
			}

			matriceCifru[i][j] = matriceCifru[i][j] % 26;
		}
	}
}

void CifrulHill(string mesaj, string cheie) {
	int cheieMatrice[3][3];
	obtineCheieMatrice(cheie, cheieMatrice);

	int vectorMesaj[3][1];
	for (int i = 0; i < 3; i++) {
		vectorMesaj[i][0] = (mesaj[i]) % 65;
	}

	int matriceCifru[3][1];

	criptare(matriceCifru, cheieMatrice, vectorMesaj);
	string textCifru;

	for (int i = 0; i < 3; i++) {
		textCifru += matriceCifru[i][0] + 65;
	}

	cout << " Text cifru:" << textCifru;
}

int main() {
	string mesaj = "CIFRU";
	string cheie = "JFGFRZDB";

	HillCipher(mesaj, cheie);

	return 0;
}
