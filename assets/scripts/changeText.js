function changeText() {
  // テキスト内容の定義
  const content = {
    '1stAnd2ndYear': {
      title: '高１・２生向け指導方針',
      text: '高１・２生の時期には<span class="c-border--emphasis">「論理的思考力」「文章表現力」「プレゼンテーション能力」を養う時期です</span>。総合型・学校推薦型選抜では志望理由書・小論文・面接が科されますが、その力はすぐに身につくものではありません。物事を筋道立てて考え、自分なりに答えを出し、表現する力を身につけましょう。また、批判的に物事を捉え、なぜ<span class="c-border--emphasis">問題や課題が生まれたのか、その解決方法は何かと考えることも必要です</span>。弊塾ではこうした力を養うために、小論文とディスカッションを重視します。また、教養を身につけるために読書や動画鑑賞等も行います。なかには課外活動を行い、コンテストに出場する塾生もいます。こうした早くから<span class="c-border--emphasis">総合型・学校推薦型選抜の対応をする塾生は、自らの力でキャリアデザインをしていきます</span>。'
    },
    'EarlyThirdYear': {
      title: '高３成長期（4月〜）',
      text: '高３生になったら、志望する学部・学科に即した教養を身につけつつ、<span class="c-border--emphasis">論理的思考力・文章表現力・プレゼンテーション能力に磨きをかけていきます</span>。他方で、志望先への志望理由も明確になる時期ですので、内容をブラッシュアップしていきます。また、問題解決能力をさらに高めるために、世界に横たわる傷を解決するための方法を学ぶ時期でもあります。<span class="c-border--emphasis">物事を表面的に捉えず、その問題が起こる仕組みを俯瞰し、問題箇所を特定して解決に導く、という考え方が大切</span>です。そうした熟達した思考になるよう、文章表現やプレゼンテーションを重ねながら鍛錬を続けます。こうした積み重ねにより、<span class="c-border--emphasis">総合型・学校推薦型選抜の基礎として、足腰を鍛えます</span>。'
    },
    'ImmediatePeriod': {
      title: '高３直前期（夏休み〜)',
      text: 'いよいよ直前期。<span class="c-border--emphasis">志望大学受験に向けて、これまで培ってきた力を万全に整える時期です</span>。志望理由書等の出願書類、事前レポート、面接、グループディスカッションは、志望先によって形式は多種多様です。それらに合わせて、<span class="c-border--emphasis">それぞれの大学に向けた対策を行います</span>。志望理由書であればアドミッション・ポリシーを想定した内容に調整したり、面接であれば内容の具体性が問われたり、回答内容自体を否定されたりする意地悪な質問に対応したりします。入試では何が起こるかわからないもので、<span class="c-border--emphasis">想定される事態に即して万全な体制で臨めるように徹底して準備します</span>。'
    },
    'Advansed': {
      title: '慶早ICU・GMARCH志望者',
      text: '慶應義塾大学SFC（総合政策学部・環境情報学部）をはじめとした<span class="c-border--emphasis">難関大学志望者は特にアドミッション・ポリシーに即した経験や事実を持つことを求めます</span>。志望理由書や面接では未来の話をするために「嘘」がつけるものですが、過去の行動や経験は嘘がつけません。<span class="c-border--emphasis">過去の経験をもとに志望理由を組み立てることが大事</span>ということです。そして、過去に課外活動を活発に行ったり、実績を出したりしている受験生がライバルになりますから、そうした経験を数多く重ねてきた人を求めます。そうした人物のほうが<span class="c-border--emphasis">「素材」が多いので、志望理由書や面接のさいに有利</span>になります。また、<span class="c-border--emphasis">小論文においても課外活動で積極的に調べ学習をし、教科の学びにも熱心になりやすく、書くための素材を多く持つことになります</span>。難関大志望者であれば、そうした受験生がやってくることを願っています。'
    }
  };

    // fadeOutIn関数の定義
    function fadeOutIn(element, newText, duration = 300) {
      element.style.transition = `opacity ${duration}ms`;
      element.style.opacity = 0; // フェードアウト開始
      setTimeout(() => {
        element.innerHTML = newText; // テキスト更新
        element.style.opacity = 1; // フェードイン開始
      }, duration);
    }

  // updateContent関数の定義
  function updateContent(key) {
    const newTitle = content[key].title;
    const newText = content[key].text;

    const titleElement = document.getElementById('title-space');
    const textElement = document.getElementById('white-space');

    fadeOutIn(titleElement, newTitle);
    fadeOutIn(textElement, newText);
  }


  // 初期テキストの設定
  updateContent('1stAnd2ndYear');

  // 各ボタンにイベントリスナーを設定
  Object.keys(content).forEach(key => {
    document.getElementById(key).addEventListener('click', function () {
      updateContent(key);
    });
  });

}

// ドキュメントの読み込み完了時に関数を実行
document.addEventListener('DOMContentLoaded', changeText);